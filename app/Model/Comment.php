<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 8/6/2018
 * Time: 18:15
 */

namespace App\Model;
use Illuminate\Support\Facades\DB;

class Comment
{
    public $text;
    public $user_id;
    public $product_id;

    public function insert()
    {
        return DB::table('comment')
        ->insert([
            'text' => $this->text,
            'user_id' => $this->user_id,
            'product_id' => $this->product_id
        ]);
    }
}