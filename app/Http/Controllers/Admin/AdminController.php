<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 8/11/2018
 * Time: 14:55
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Action;
use App\Model\Cart;
use App\Model\Gallery;
use App\Model\Category;
use App\Model\Message;
use App\Model\Notify;
use App\Model\Product;
use App\Model\Slider;
use App\Model\User;
use Illuminate\Database\QueryException;

class AdminController extends Controller
{
    private $data;

    public function __construct()
    {
        $message = new Message();
        $this->data['count'] = $message->getNewMessage();
        $notify = new Notify();
        $this->data['notify'] = $notify->getNewNotify();
        $this->data['notification'] = $notify->getNotify();
    }

    public function index()
    {
        return view('admin.pages.home',$this->data);
    }

    public function gallery()
    {
        $gallery = new Gallery();
        $this->data['galleries'] = $gallery->getAll();
        return view('admin.pages.gallery', $this->data);
    }

    public function category()
    {
        $category = new Category();
        $this->data['categories'] = $category->getCategories();
        return view('admin.pages.category', $this->data);
    }

    public function users()
    {
        $user = new User();
        $this->data['users'] = $user->getAll();
        return view('admin.pages.users', $this->data);
    }

    public function cart()
    {
        $cart = new Cart();
        $this->data['cart'] = $cart->getAll();
        $user = new User();
        $this->data['users'] = $user->getAll();
        return view('admin.pages.cart', $this->data);
    }

    public function products()
    {
        $category = new Category();
        $this->data['categories'] = $category->getCategories();
        $action = new Action();
        $this->data['actions'] = $action->getAll();
        $product = new Product();
        $this->data['products'] = $product->getAll();
        return view('admin.pages.products', $this->data);
    }

    public function slider()
    {
        $slider = new Slider();
        $this->data['slider'] = $slider->getSliders();
        return view('admin.pages.slider', $this->data);
    }

    public function inbox($id = null)
    {
        if ($id == null)
        {
            $message = new Message();
            $this->data['messages'] = $message->getAll();
            return view('admin.pages.inbox',$this->data);
        }
        else
        {
            $message = new Message();
            $message->id = $id;
            $this->data['message'] = $message->getOne();

            if ($this->data['message']->status == 1)
            {
                $res = $message->setStatus();
                if ($res)
                {
                    return view('admin.pages.inbox',$this->data);
                }
            }
            else
            {
                return view('admin.pages.inbox',$this->data);
            }

        }
    }

    public function images()
    {
        $gallery = new Gallery();
        $this->data['galleries'] = $gallery->getAll();
        $this->data['countImages'] = $gallery->getCountImages();
        return view('admin.pages.images', $this->data);
    }

    public function notify()
    {
        return view('admin.pages.notify',$this->data);
    }

    public function notifyUpdate($id)
    {
        $notify = new Notify();
        $notify->id = $id;
        $res = $notify->update();
        if ($res)
        {
            return redirect('/admin/home');
        }
    }

}