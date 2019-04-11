<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 8/3/2018
 * Time: 16:05
 */

namespace App\Model;
use Illuminate\Support\Facades\DB;

class Message
{
    public $id;
    public $fullName;
    public $email;
    public $subject;
    public $time;

    public function insert()
    {
        return DB::table('message')
            ->insert([
               'fullName' => $this->fullName,
               'email' => $this->email,
               'subject' => $this->subject,
                'time' => $this->time,
                'status' => 1
            ]);
    }

    public function getAll()
    {
        return DB::table('message')
            ->get();
    }

    public function getOne()
    {
        return DB::table('message')
            ->where('id',$this->id)
            ->first();
    }

    public function delete()
    {
        return DB::table('message')
            ->where('id',$this->id)
            ->delete();
    }

    public function getNewMessage()
    {
        return DB::table('message')
            ->where('status',1)
            ->count();
    }

    public function setStatus()
    {
        return DB::table('message')
            ->where('id',$this->id)
            ->update([
               'status' => 0
            ]);
    }
}