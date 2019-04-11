<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 8/2/2018
 * Time: 12:40
 */

namespace App\Model;
use Illuminate\Support\Facades\DB;

class Category
{
    public $id;
    public $name;

    public function getCategories()
    {
        return DB::table('category')
            ->get();
    }

    public function insert()
    {
        return DB::table('category')
            ->insert([
                'name' => $this->name
            ]);
    }

    public function delete()
    {
        return DB::table('category')
            ->where('id',$this->id)
            ->delete();
    }

    public function getOne()
    {
        return DB::table('category')
            ->where('id',$this->id)
            ->first();
    }

    public function update()
    {
        return DB::table('category')
            ->where('id',$this->id)
            ->update([
                'name' => $this->name
            ]);
    }
}