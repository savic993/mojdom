<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 8/16/2018
 * Time: 15:18
 */

namespace App\Model;

use Illuminate\Support\Facades\DB;

class Notify
{
    public $id;
    public $user_id;
    public $product_id;
    public $cart_id;
    public $status;

    public function insert()
    {
        return DB::table('notify')
            ->insert([
               'user_id' => $this->user_id,
               'product_id' => $this->product_id,
                'cart_id' => $this->cart_id,
                'status' => 1
            ]);
    }

    public function getNewNotify()
    {
        return DB::table('notify')
            ->where('status',1)
            ->count();
    }

    public function getNotify()
    {
        return DB::table('notify')
            ->join('user','notify.user_id','user.id')
            ->join('product','notify.product_id','product.id')
            ->join('cart','notify.cart_id','cart.id')
            ->select('notify.*','user.fullName','product.title','cart.time')
            ->where('status',1)
            ->get();
    }

    public function update()
    {
        return DB::table('notify')
            ->where('id', $this->id)
            ->update([
               'status' => 0
            ]);
    }

    public function delete()
    {
        return DB::table('notify')
            ->where(
                'cart_id', $this->cart_id
            )
            ->delete();
    }
}