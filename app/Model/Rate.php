<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 8/6/2018
 * Time: 17:32
 */

namespace App\Model;
use Illuminate\Support\Facades\DB;

class Rate
{
    public $rate_id;
    public $user_id;
    public $product_id;

    public function vote()
    {
        return DB::table('rate')
            ->insert([
                'user_id' => $this->user_id,
                'product_id' => $this->product_id,
                'rate' => $this->rate_id
            ]);
    }

}