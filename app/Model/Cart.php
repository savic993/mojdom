<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 8/5/2018
 * Time: 13:58
 */

namespace App\Model;
use Illuminate\Support\Facades\DB;


class Cart
{
    public $id;
    public $user_id;
    public $product_id;

    public function store()
    {
        return DB::table('cart')
        ->insertGetId([
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'time' => time()
        ]);
    }

    public function getCart()
    {
        return DB::table('product')
        ->join('action','product.action_id','action.id')
        ->join('cart','product.id','cart.product_id')
        ->where('cart.user_id', $this->user_id)
        ->select('product.*','action.discount','cart.id as cartId')
        ->get();
    }

    public function delete()
    {
        return DB::table('cart')
        ->where([
            'id' => $this->id
        ])
        ->delete();
    }

    public function getAll()
    {
        return DB::table('cart')
        ->join('user','cart.user_id','user.id')
        ->join('product','cart.product_id','product.id')
        ->select('cart.time as time', 'cart.id as idCart','user.*','product.title')
        ->get();
    }

    public function deleteCart()
    {
        return DB::table('cart')
        ->where('id',$this->id)
        ->delete();
    }

    public function filter($user)
    {
        return DB::table('cart')
        ->join('user','cart.user_id','user.id')
        ->join('product','cart.product_id','product.id')
        ->where('user.id',$user)
        ->select('cart.time as time', 'cart.id as idCart','user.*','product.title')
        ->get();
    }

}