<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 8/12/2018
 * Time: 11:46
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Role;
use App\Model\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $model;
    private $data;

    public function __construct()
    {
        $this->model = new User();
    }

    public function delete($id)
    {
        $this->model->id = $id;

        try
        {
            $res = $this->model->delete();

            if ($res)
            {
                return redirect()->back();
            }
        }
        catch (QueryException $e)
        {
            \Log::error('Greska pri brisanju korisnika' . $e->getMessage());
            return redirect()->back()->with('error', 'Greska pri brisanju korisnika');
        }
    }

    public function showOne($id)
    {
        $this->model->id = $id;

        $this->data['user'] = $this->model->getOne();

        $role = new Role();
        $this->data['roles'] = $role->getAll();

        return view('admin.pages.users',$this->data);
    }

    public function update(Request $request, $id)
    {
        $this->model->id = $id;
        $this->model->role_id = $request->get('role');

        try
        {
            $res = $this->model->update();

            if ($res)
            {
                return redirect('/admin/users')->with('success', 'Uspesno ste izmenili podatke za korisnika');
            }
            else
            {
                return redirect('/admin/users')->with('error', 'Greska pri izmeni podataka');
            }
        }
        catch (QueryException $e)
        {
            \Log::error('Greska pri izmeni podataka za korisnika' . $e->getMessage());
            return redirect()->back()->with('error', 'Greska pri izmeni podataka za korisnika');
        }
    }
}