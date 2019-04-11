<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 8/1/2018
 * Time: 20:13
 */

namespace App\Model;
use Illuminate\Support\Facades\DB;

class Slider
{
    public $id;
    public $src;
    public $alt;
    public $description;

    public function getSliders()
    {
        return DB::table('slider')
            ->get();
    }

    public function insert()
    {
        return DB::table('slider')
            ->insert([
               'src' => $this->src,
                'alt' => $this->alt,
                'slider_description' => $this->description
            ]);
    }

    public function getOne()
    {
        return DB::table('slider')
            ->where('id', $this->id)
            ->get();
    }

    public function update()
    {
        return DB::table('slider')
            ->where('id', $this->id)
            ->update([
                'slider_description' => $this->description
            ]);
    }

    public function delete()
    {
        return DB::table('slider')
            ->where('id',$this->id)
            ->delete();
    }

    public function getSrc()
    {
        return DB::table('slider')
            ->where('id', $this->id)
            ->select('src')
            ->first();
    }
}