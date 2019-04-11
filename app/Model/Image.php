<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 8/16/2018
 * Time: 13:56
 */

namespace App\Model;


use Illuminate\Support\Facades\DB;

class Image
{
    public $id;
    public $alt;
    public $src;
    public $gallery_id;

    public function insert()
    {
        return DB::table('image')
            ->insert([
               'alt' => $this->alt,
               'src' => $this->src,
               'gallery_id' => $this->gallery_id
            ]);
    }

    public function getImages()
    {
        return DB::table('image')
            ->where('gallery_id',$this->gallery_id)
            ->get();
    }

    public function delete()
    {
        return DB::table('image')
            ->where('id',$this->id)
            ->delete();
    }

    public function getSrc()
    {
        return DB::table('image')
            ->where('id',$this->id)
            ->select('src')
            ->first();
    }

}