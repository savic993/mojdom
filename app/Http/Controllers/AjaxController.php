<?php

namespace App\Http\Controllers;

use App\Model\Cart;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Rate;

class AjaxController extends Controller
{
    private $data;

    public function perPage(Request $request)
    {
        $perPage = $request->get('perPage');
        if ($perPage != 0)
        {
            $product = new Product();
            $product->pag = $perPage;
            $this->data['products'] = $product->perPage();
            return view('front.components.products.product', $this->data);
        }
        else
        {
            $product = new Product();
            $this->data['products'] = $product->getAll();
            return view('front.components.products.prod', $this->data);
        }
    }

    public function sort(Request $request)
    {
        $sort = $request->get('sort');
        if (($sort == 'number_buy') || ($sort == 'price'))
        {
            $product = new Product();
            $product->sort = $sort;
            $this->data['products'] = $product->sort();
            return view('front.components.products.prod', $this->data);
        }
        else
        {
            $product = new Product();
            $this->data['products'] = $product->getAll();
            return view('front.components.products.prod', $this->data);
        }
    }

    public function rate(Request $request)
    {
        $rate = new Rate();
        $rate->product_id =  $request->get('product');
        $rate->user_id = $request->get('user');
        $rate->rate_id = $request->get('rate');

        $result = $rate->vote();

        if ($result)
        {
            return response()->json('Uspesno ste glasali',200);
        }
    }

    public function search(Request $request)
    {
        $param = $request->get('param');
        $product = new Product();
        $products = $product->getByInput($param);
        return view('front.ajax.search', compact('products'));
    }

    public function cartSearch(Request $request)
    {
        $user =  $request->get('user');
        $cart = new Cart();
        if ($user == 0)
        {
            $this->data['cart'] = $cart->getAll();
        }
        else
        {
            $this->data['cart'] = $cart->filter($user);
        }
        return view('admin.components.cart.table', $this->data);
    }

    public function action(Request $request)
    {
        $action = $request->get('action');
        if ($action == 0)
        {
            $product = new Product();
            $this->data['products'] = $product->action();
            return view('front.components.products.prod', $this->data);
        }
        else
        {
            $product = new Product();
            $this->data['products'] = $product->getByAction($action);
            return view('front.components.products.prod', $this->data);
        }
    }

    public function pagination(Request $request)
    {
        $perPage = $request->get('perPage');      
        $product = new Product();
        $product->pag = $perPage;
        $products = $product->pagProduct();
        return view('front.components.products.product', compact('products'));
    }

}
