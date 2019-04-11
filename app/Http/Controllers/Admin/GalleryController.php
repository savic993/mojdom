<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 8/11/2018
 * Time: 15:40
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Model\Gallery;

class GalleryController extends Controller
{
    private $model;
    private $data;

    public function __construct()
    {
        $this->model = new Gallery();
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
                return redirect()->back()->with('success', 'Uspesno ste dodali galeriju');
            }
            else
            {
                return redirect()->back()->with('error', 'Greska pri dodavanju galerije');
            }
        }
        catch (QueryException $e)
        {
            \Log::error('Greska pri dodavanju galerije' . $e->getMessage());
            return redirect()->back()->with('error', 'Greska pri dodavanju galerije');
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
            \Log::error('Greska pri brisanju galerije' . $e->getMessage());
            return redirect()->back()->with('error', 'Greska pri brisanju galerije');
        }
    }

    public function showOne($id)
    {
        $this->model->id = $id;

        $this->data['gallery'] = $this->model->getOne();

        return view('admin.pages.gallery',$this->data);
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
                return redirect('/admin/gallery')->with('success', 'Uspesno ste izmenili podatke za galeriju');
            }
            else
            {
                return redirect('/admin/gallery')->with('error', 'Greska pri izmeni podataka');
            }
        }
        catch (QueryException $e)
        {
            \Log::error('Greska pri izmeni podataka za galeriju' . $e->getMessage());
            return redirect()->back()->with('error', 'Greska pri izmeni podataka za galeriju');
        }
    }
}