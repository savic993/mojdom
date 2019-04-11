<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 8/9/2018
 * Time: 17:19
 */

namespace App\Model;
use Illuminate\Support\Facades\DB;

class Gallery
{
    public $id;
    public $name;

    public function getAll()
    {
        $galleries = DB::table('gallery')
            ->get();

        foreach ($galleries as $gallery)
        {
            $gallery->img = DB::table('image')
                ->where('gallery_id',$gallery->id)
                ->first();
        }

        return $galleries;
    }

    public function getGallery()
    {
        return DB::table('image')
            ->where('gallery_id', $this->id)
            ->get();
    }

    public function insert()
    {
        return DB::table('gallery')
            ->insert([
               'name' => $this->name
            ]);
    }

    public function delete()
    {
        return DB::table('gallery')
            ->where('id',$this->id)
            ->delete();
    }

    public function getOne()
    {
        return DB::table('gallery')
            ->where('id',$this->id)
            ->first();
    }

    public function update()
    {
        return DB::table('gallery')
            ->where('id',$this->id)
            ->update([
               'name' => $this->name
            ]);
    }

    public function getCountImages()
    {
        $galleries = DB::table('gallery')
            ->get();

        foreach ($galleries as $g)
        {
            $g->count = DB::table('image')
                ->where('gallery_id',$g->id)
                ->count();
        }

        return $galleries;
    }
}