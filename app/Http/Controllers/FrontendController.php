<?php

namespace App\Http\Controllers;

use App\Model\Action;
use App\Model\Notify;
use App\Model\Rate;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Model\Menu;
use App\Model\Slider;
use App\Model\Product;
use App\Model\Category;
use App\Model\Message;
use App\Model\Cart;
use App\Model\Comment;
use App\Model\Gallery;

class FrontendController extends Controller
{
    private $data;

    public function __construct()
    {
        $menu = new Menu();
        $this->data['menus'] = $menu->getMenus();
        $slider = new Slider();
        $this->data['sliders'] = $slider->getSliders();
        $category = new Category();
        $this->data['categories'] = $category->getCategories();
    }

    public function index()
    {
        $product = new Product();
        $this->data['products'] = $product->newProducts();
        return view('front.pages.home', $this->data);
    }

    public function registration()
    {
        return view('front.pages.registration', $this->data);
    }

    public function login()
    {
        return view('front.pages.login', $this->data);
    }

    public function contact()
    {
        return view('front.pages.contact', $this->data);
    }

    public function allProducts($id = null)
    {
        $product = new Product();
        if ($id == null)
        {
            $this->data['products'] = $product->getAllProducts();
            return view('front.pages.products', $this->data);
        }
        else
        {
            $product->id = $id;
            $this->data['product'] = $product->oneProduct();
            $this->data['products'] = $product->newProducts();
            return view('front.pages.product', $this->data);
        }
    }

    public function getByCategory($id)
    {
        $product = new Product();
        $product->category_id = $id;
        $this->data['products'] = $product->getByCategory();
        return view('front.pages.category',$this->data);
    }

    public function action()
    {
        $product = new Product();
        $this->data['products'] = $product->action();
        $action = new Action();
        $this->data['actions'] = $action->getActions();
        return view('front.pages.action', $this->data);
    }

    public function hit()
    {
        $product = new Product();
        $this->data['products'] = $product->hit();
        return view('front.pages.hit', $this->data);
    }

    public function sendMail(Request $request)
    {
        $rules = [
            'fullName' => 'required',
            'email' => 'required|email',
            'subject' => 'required'
        ];

        $messages = [
            "required" => 'Polje :attribute je obavezno',
            "email" => 'Email nije validan'
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);
        $validator->validate();

        $message = new Message();
        $message->fullName = $request->get('fullName');
        $message->email = $request->get('email');
        $message->subject = $request->get('subject');
        $message->time = time();

        try
        {
            $result = $message->insert();

            if ($result)
            {
                return redirect()->back()->with('success', 'Uspesno ste nam poslali poruku');
            }
            else
            {
                return redirect()->back()->with('success', 'Doslo je do greske');
            }
        }
        catch (QueryException $e)
        {
            \Log::error('Greska pri slanju poruke administratoru' . $e->getMessage());
            return redirect()->back()->with('error', 'Greska pri slanju poruke, pokusajte ponovo');
        }

    }

    public function paginate()
    {
        $product = new Product();
        $this->data['products'] = $product->pagination();
        return view('front.pages.products', $this->data);
    }

    public function store($product, Request $request)
    {
        $cart = new Cart();
        $cart->product_id = $product;
        $cart->user_id = $request->get('user');

        $result = $cart->store();

        if ($result)
        {
            $prod = new Product();
            $prod->id = $product;
            $state = $prod->getState();
            if ($state[0]->state != 0)
            {
                $prod->state = $state[0]->state-1;
                $res = $prod->setState();

                if ($res)
                {
                    $numb = $prod->getNumberBuy();
                    $prod->number_buy = $numb[0]->number_buy+1;
                    $r = $prod->setNumberBuy();
                    if ($r)
                    {
                        $notify = new Notify();
                        $notify->product_id = $product;
                        $notify->user_id = $request->get('user');
                        $notify->cart_id = $result;

                        $n = $notify->insert();
                        if ($n)
                        {
                            return redirect('/')->with('success', 'Proizvod je unet u korpu');
                        }
                    }
                }
            }
            else
            {
                return redirect('/')->with('error', 'Trenutno nemamo na stanju');
            }
        }
        else
        {
            return redirect('/')->with('error', 'Greska pri kupovini');
        }

    }

    public function viewStore($user)
    {
        $cart = new Cart();
        $cart->user_id = $user;
        $this->data['products'] = $cart->getCart();

        return view('front.pages.cart', $this->data);

    }

    public function insertComment(Request $request)
    {
        $rules = [
            'text' => 'required'
        ];

        $messages = [
            "required" => 'Polje :attribute je obavezno'
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);
        $validator->validate();

        $comment = new Comment();
        $comment->text = $request->get('text');
        $comment->product_id = $request->get('id_product');
        $comment->user_id = $request->session()->get('user')[0]->id;

        try
        {
            $result = $comment->insert();

            if ($result)
            {
                return redirect()->back();
            }
            else
            {
                return redirect()->back()->with('error', 'Greska pri dodavanju komentara');
            }
        }
        catch(QueryException $e)
        {
            \Log::error('Greska pri postavljanju komentara' . $e->getMessage());
            return redirect()->back()->with('error', 'Greska pri postavljanju komentara');
        }
    }
    
    public function gallery($id = null)
    {
        if ($id == null)
        {
            $gallery = new Gallery();
            $this->data['galleries'] = $gallery->getAll();
            return view('front.pages.gallery',$this->data);
        }
        else
        {
            $gallery = new Gallery();
            $gallery->id = $id;
            $this->data['gallery'] = $gallery->getGallery();
            return view('front.pages.images',$this->data);
        }
    }

    public function emptyCart($id)
    {
        $cart = new Cart();
        $cart->id = $id;

        try
        {
            $res = $cart->delete();

            if ($res)
            {
                $notify = new Notify();
                $notify->cart_id = $id;

                $r = $notify->delete();

                if ($r)
                {
                    return redirect()->back();
                }
            }
            else
            {
                return redirect()->back()->with('error', 'Doslo je do greske');
            }
        }
        catch(QueryException $e)
        {
            \Log::error('Doslo je do greske pri brisanju' . $e->getMessage());
            return redirect()->back()->with('error', 'Greska pri brisanju');
        }
    }

}
