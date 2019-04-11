<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 8/1/2018
 * Time: 19:41
 */

namespace App\Model;
use Illuminate\Support\Facades\DB;

class Menu
{
    public function getMenus()
    {
        return DB::table('menu')
            ->get();
    }
}