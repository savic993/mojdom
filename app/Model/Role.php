<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 8/12/2018
 * Time: 11:57
 */

namespace App\Model;

use Illuminate\Support\Facades\DB;

class Role
{
    public function getAll()
    {
        return DB::table('role')
            ->get();
    }
}