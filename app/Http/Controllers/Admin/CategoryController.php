<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 8/11/2018
 * Time: 17:36
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $model;
    private $data;

    public function __construct()
    {
        $this->model = new Category();
    }

    public function insert(Request $request)
    {
        $rules = [
            'name' => 'required'
        ];

        $messages = [
            "required" => 'Polje :attribute je obavezno'
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);
        $validator->validate();

        $this->model->name = $request->get('name');

        try
        {
            $res = $this->model->insert();

            if ($res)
            {
                return redirect()->back()->with('success', 'Uspesno ste dodali kategoriju');
            }
            else
            {
                return redirect()->back()->with('error', 'Greska pri dodavanju kategorije');
            }
        }
        catch (QueryException $e)
        {
            \Log::error('Greska pri dodavanju kategorije' . $e->getMessage());
            return redirect()->back()->with('error', 'Greska pri dodavanju kategorije');
        }
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
            \Log::error('Greska pri brisanju kategorije' . $e->getMessage());
            return redirect()->back()->with('error', 'Greska pri brisanju kategorije');
        }
    }

    public function showOne($id)
    {
        $this->model->id = $id;

        $this->data['category'] = $this->model->getOne();

        return view('admin.pages.category',$this->data);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required'
        ];

        $messages = [
            "required" => 'Polje :attribute je obavezno'
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);
        $validator->validate();

        $this->model->id = $id;
        $this->model->name = $request->get('name');

        try
        {
            $res = $this->model->update();

            if ($res)
            {
                return redirect('/admin/category')->with('success', 'Uspesno ste izmenili podatke za kategoriju');
            }
            else
            {
                return redirect('/admin/category')->with('error', 'Greska pri izmeni podataka');
            }
        }
        catch (QueryException $e)
        {
            \Log::error('Greska pri izmeni podataka za kategoriju' . $e->getMessage());
            return redirect()->back()->with('error', 'Greska pri izmeni podataka za kategoriju');
        }
    }
}