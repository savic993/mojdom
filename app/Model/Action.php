<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 8/13/2018
 * Time: 16:13
 */

namespace App\Model;

use Illuminate\Support\Facades\DB;

class Action
{
    public function getAll()
    {
        return DB::table('action')
            ->get();
    }

    public function getActions()
    {
        return DB::table('action')
            ->where('discount','<>', 0)
            ->get();
    }
}