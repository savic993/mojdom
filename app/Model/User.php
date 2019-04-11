<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 8/3/2018
 * Time: 13:33
 */

namespace App\Model;
use Illuminate\Support\Facades\DB;

class User
{
    public $id;
    public $fullName;
    public $username;
    public $password;
    public $email;
    public $role_id;

    public function login()
    {
        return DB::table('user')
            ->join('role','user.role_id','role.id')
            ->select('user.*', 'role.name')
            ->where([
                ['email', '=' , $this->email],
                ['password', '=', $this->password]
            ])
            ->first();
    }

    public function insert()
    {
        return DB::table('user')
            ->insert([
                'fullName' => $this->fullName,
                'username' => $this->username,
                'password' => $this->password,
                'email' => $this->email,
                'role_id' => $this->role_id
            ]);
    }

    public function getAll()
    {
        return DB::table('user')
            ->join('role','user.role_id','role.id')
            ->select('user.*','role.name as role')
            ->get();
    }

    public function getOne()
    {
        return DB::table('user')
            ->join('role','user.role_id','role.id')
            ->where('user.id',$this->id)
            ->select('user.*','role.name as role')
            ->first();
    }

    public function delete()
    {
        return DB::table('user')
            ->where('id',$this->id)
            ->delete();
    }

    public function update()
    {
        return DB::table('user')
            ->where('id',$this->id)
            ->update([
                'role_id' => $this->role_id
            ]);
    }
}