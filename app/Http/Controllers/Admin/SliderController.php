<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 8/13/2018
 * Time: 18:34
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Slider;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    private $model;
    private $data;

    public function __construct()
    {
        $this->model = new Slider();
    }

    public function insert(Request $request)
    {
        $rules = [
            'file' => 'mimes:jpg,jpeg,png,gif',
            'alt' => 'required',
            'description' => 'required'
        ];

        $messages = [
            "mimes" => 'Nije podrzan format datoteke',
            "required" => 'Polje :attribute je obavezno'
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);
        $validator->validate();

        $photo = $request->file('file');
        $tmp = $photo->getPathName();
        $ext = $photo->getClientOriginalExtension();
        $namePhoto = time().'.'.$ext;
        $newPath = 'images/slider/'.$namePhoto;
        $serverPath = public_path($newPath);

        File::move($tmp, $serverPath);

        $this->model->src = $newPath;
        $this->model->alt = $request->get('alt');
        $this->model->description = $request->get('description');

        try
        {
            $res = $this->model->insert();

            if ($res)
            {
                return redirect()->back()->with('success', 'Uspesno ste dodali slajd');
            }
            else
            {
                return redirect()->back()->with('error', 'Greska pri dodavanju slajda');
            }
        }
        catch (QueryException $e)
        {
            \Log::error('Greska pri dodavanju slajda' . $e->getMessage());
            return redirect()->back()->with('error', 'Greska pri dodavanju slajda');
        }
    }

    public function showOne($id)
    {
        $this->model->id = $id;

        $this->data['slide'] = $this->model->getOne();

        return view('admin.pages.slider',$this->data);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'description' => 'required'
        ];

        $messages = [
            "required" => 'Polje :attribute je obavezno'
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);
        $validator->validate();

        $this->model->id = $id;
        $this->model->description = $request->get('description');

        try
        {
            $res = $this->model->update();

            if ($res)
            {
                return redirect('/admin/slider')->with('success', 'Uspesno ste izmenili podatke za slajd');
            }
            else
            {
                return redirect('/admin/slider')->with('error', 'Greska pri izmeni podataka');
            }
        }
        catch (QueryException $e)
        {
            \Log::error('Greska pri izmeni podataka za slajd' . $e->getMessage());
            return redirect()->back()->with('error', 'Greska pri izmeni podataka za slajd');
        }
    }

    public function delete($id)
    {
        $this->model->id = $id;

        try
        {
            $src = $this->model->getSrc();

            unlink(public_path($src->src));

            $res = $this->model->delete();

            if ($res)
            {
                return redirect()->back();
            }
        }
        catch (QueryException $e)
        {
            \Log::error('Greska pri brisanju slajda' . $e->getMessage());
            return redirect()->back()->with('error', 'Greska pri brisanju slajda');
        }
    }
}