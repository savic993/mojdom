<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 8/1/2018
 * Time: 20:20
 */

namespace App\Model;
use Illuminate\Support\Facades\DB;

class Product
{
    public $id;
    public $title;
    public $description;
    public $price;
    public $action_id;
    public $src;
    public $alt;
    public $category_id;
    public $pag;
    public $sort;
    public $state;
    public $number_buy;

    public function newProducts()
    {
        $products = DB::table('product')
            ->join('action','product.action_id','action.id')
            ->select('product.*','action.discount')
            ->orderBy('posted_at', 'desc')
            ->limit(6)
            ->get();

        foreach ($products as $product)
        {
            $product->rate = DB::table('rate')
                ->where('product_id', $product->id)
                ->avg('rate');
        }

        return $products;
    }

    public function getAllProducts()
    {
        $products = DB::table('product')
            ->join('action','product.action_id','action.id')
            ->select('product.*','action.discount')
            ->paginate(4);

        foreach ($products as $product)
        {
            $product->rate = DB::table('rate')
                ->where('product_id', $product->id)
                ->avg('rate');
        }

        return $products;
    }

    public function pagProduct()
    {
        $products = DB::table('product')
            ->join('action','product.action_id','action.id')
            ->select('product.*','action.discount')
            ->paginate($this->pag);

        foreach ($products as $product)
        {
            $product->rate = DB::table('rate')
                ->where('product_id', $product->id)
                ->avg('rate');
        }

        return $products;
    }

    public function oneProduct()
    {
        $products = DB::table('product')
            ->join('action','product.action_id','action.id')
            ->select('product.*','action.discount')
            ->where('product.id',$this->id)
            ->get();

        foreach ($products as $product)
        {
            $product->rate = DB::table('rate')
                ->where('product_id', $product->id)
                ->avg('rate');
        }

        foreach($products as $product)
        {
            $product->comments = DB::table('comment')->join('user', 'comment.user_id', 'user.id')->select('user.username','comment.*')->where('product_id',$product->id)->get();
        }
        return $products;
    }

    public function getByCategory()
    {
        $products = DB::table('product')
            ->join('action','product.action_id','action.id')
            ->select('product.*','action.discount')
            ->where('category_id',$this->category_id)
            ->get();

        foreach ($products as $product)
        {
            $product->rate = DB::table('rate')
                ->where('product_id', $product->id)
                ->avg('rate');
        }

        return $products;
    }

    public function action()
    {
        $products = DB::table('product')
            ->join('action', 'product.action_id','action.id')
            ->where('action_id','<>', 5)
            ->get();

        foreach ($products as $product)
        {
            $product->rate = DB::table('rate')
                ->where('product_id', $product->id)
                ->avg('rate');
        }

        return $products;
    }

    public function hit()
    {
        $products = DB::table('product')
            ->join('action','product.action_id','action.id')
            ->select('product.*','action.discount')
            ->orderBy('number_buy', 'desc')
            ->limit(6)
            ->get();

        foreach ($products as $product)
        {
            $product->rate = DB::table('rate')
                ->where('product_id', $product->id)
                ->avg('rate');
        }

        return $products;
    }

    public function perPage()
    {
        $products = DB::table('product')
            ->join('action','product.action_id','action.id')
            ->select('product.*','action.discount')
            ->paginate($this->pag);

        foreach ($products as $product)
        {
            $product->rate = DB::table('rate')
                ->where('product_id', $product->id)
                ->avg('rate');
        }

        return $products;
    }

    public function getAll()
    {
        $products = DB::table('product')
            ->join('action','product.action_id','action.id')
            ->select('product.*','action.discount')
            ->get();

        foreach ($products as $product)
        {
            $product->rate = DB::table('rate')
                ->where('product_id', $product->id)
                ->avg('rate');
        }

        return $products;
    }

    public function sort()
    {
        $products = DB::table('product')
            ->join('action','product.action_id','action.id')
            ->select('product.*','action.discount')
            ->orderBy($this->sort,'desc')
            ->get();

        foreach ($products as $product)
        {
            $product->rate = DB::table('rate')
                ->where('product_id', $product->id)
                ->avg('rate');
        }

        return $products;
    }

    public function getState()
    {
        return DB::table('product')
            ->select('state')
            ->where('product.id',$this->id)
            ->get();
    }

    public function setState()
    {
        return DB::table('product')
            ->where('id',$this->id)
            ->update([
               'state' => $this->state
            ]);
    }

    public function getNumberBuy()
    {
        return DB::table('product')
            ->select('number_buy')
            ->where('product.id',$this->id)
            ->get();
    }

    public function setNumberBuy()
    {
        return DB::table('product')
            ->where('id',$this->id)
            ->update([
                'number_buy' => $this->number_buy
            ]);
    }

    public function getByInput($input){
        $products = DB::table('product')
        ->join('action','product.action_id','action.id')
        ->select('*')
        ->where('product.title','like','%'.$input.'%')
        ->paginate(4);

        foreach ($products as $product)
        {
            $product->rate = DB::table('rate')
            ->where('product_id', $product->id)
            ->avg('rate');
        }

        return $products;
    }

    public function insert()
    {
        return DB::table('product')
            ->insert([
                'title' => $this->title,
                'description' => $this->description,
                'price' => $this->price,
                'state' => $this->state,
                'number_buy' => $this->number_buy,
                'category_id' => $this->category_id,
                'action_id' => $this->action_id,
                'posted_at' => time(),
                'src' => $this->src,
                'alt' => $this->alt
            ]);
    }

    public function update()
    {
        return DB::table('product')
            ->where('id',$this->id)
            ->update([
                'title' => $this->title,
                'description' => $this->description,
                'price' => $this->price,
                'state' => $this->state,
                'action_id' => $this->action_id,
                'src' => $this->src
            ]);
    }

    public function delete()
    {
        return DB::table('product')
            ->where('id', $this->id)
            ->delete();
    }

    public function getSrc()
    {
        return DB::table('product')
            ->where('id',$this->id)
            ->select('src')
            ->first();
    }

    public function getByAction($action)
    {
        $products = DB::table('product')
            ->join('action', 'product.action_id', 'action.id')
            ->where('product.action_id',$action)
            ->get();

        foreach ($products as $product)
        {
            $product->rate = DB::table('rate')
                ->where('product_id', $product->id)
                ->avg('rate');
        }

        return $products;
    }

    public function count()
    {
        return DB::table('product')
        ->count();
    }
}