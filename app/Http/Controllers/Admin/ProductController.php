<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 8/13/2018
 * Time: 16:22
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Action;
use App\Model\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    private $model;
    private $data;

    public function __construct()
    {
        $this->model = new Product();
    }

    public function insert(Request $request)
    {
        $rules = [
            'file' => 'mimes:jpg,jpeg,png,gif',
            'title' => 'required',
            'alt' => 'required',
            'description' => 'required',
            'price' => 'required',
            'state' => 'required',
            'category' => 'not_in:0'
        ];

        $messages = [
            "mimes" => 'Nije podrzan format datoteke',
            "required" => 'Polje :attribute je obavezno',
            'not_in' => 'Izaberite kategoriju proizvoda'
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);
        $validator->validate();

        $photo = $request->file('file');
        $tmp = $photo->getPathName();
        $ext = $photo->getClientOriginalExtension();
        $namePhoto = time().'.'.$ext;
        $newPath = 'images/products/'.$namePhoto;
        $serverPath = public_path($newPath);

        File::move($tmp, $serverPath);

        $this->model->title = $request->get('title');
        $this->model->description = $request->get('description');
        $this->model->price = $request->get('price');
        $this->model->state = $request->get('state');
        $this->model->category_id = $request->get('category');
        $this->model->action_id = $request->get('action');
        $this->model->alt = $request->get('alt');
        $this->model->number_buy = 0;
        $this->model->src = $newPath;

        try
        {
            $res = $this->model->insert();

            if ($res)
            {
                return redirect()->back()->with('success', 'Uspesno ste dodali proizvod');
            }
            else
            {
                return redirect()->back()->with('error', 'Greska pri dodavanju proizvoda');
            }
        }
        catch (QueryException $e)
        {
            \Log::error('Greska pri dodavanju proizvoda' . $e->getMessage());
            return redirect()->back()->with('error', 'Greska pri dodavanju proizvoda');
        }
    }

    public function showOne($id)
    {
        $this->model->id = $id;

        $this->data['product'] = $this->model->oneProduct();

        $action = new Action();
        $this->data['actions'] = $action->getAll();

        return view('admin.pages.products',$this->data);
    }

    public function update(Request $request, $id)
    {
        //validacija
        $this->model->id = $id;
        $this->model->title = $request->get('title');
        $this->model->description = $request->get('description');
        $this->model->price = $request->get('price');
        $this->model->state = $request->get('state');
        $this->model->action_id = $request->get('action');

        $slika = $request->file('file');

        if(!empty($slika))
        {
            $product = $this->model->oneProduct();
            File::delete($product[0]->src);

			$tmp_putanja = $slika->getPathName();
			$ime_fajla = time().'.'.$slika->getClientOriginalExtension();
			$putanja = 'images/products/'.$ime_fajla;
			$putanja_server = public_path($putanja);

			File::move($tmp_putanja, $putanja_server);

			$this->model->src = $putanja;
        }

        try
        {
            $res = $this->model->update();

            if ($res)
            {
                return redirect('/admin/product')->with('success', 'Uspesno ste izmenili podatke za proizvod');
            }
            else
            {
                return redirect('/admin/product')->with('error', 'Greska pri izmeni podataka');
            }
        }
        catch (QueryException $e)
        {
            \Log::error('Greska pri izmeni podataka za proizvod' . $e->getMessage());
            return redirect()->back()->with('error', 'Greska pri izmeni podataka za proizvod');
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
            \Log::error('Greska pri brisanju proizvoda' . $e->getMessage());
            return redirect()->back()->with('error', 'Greska pri brisanju proizvoda');
        }
    }
}