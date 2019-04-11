<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 8/16/2018
 * Time: 13:56
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Image;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    private $model;
    private $data;

    public function __construct()
    {
        $this->model = new Image();
    }

    public function insert(Request $request)
    {
        $rules = [
            'file' => 'mimes:jpg,jpeg,png,gif',
            'gallery' => 'not_in:0',
            'alt' => 'required'
        ];

        $messages = [
            "mimes" => 'Nije podrzan format datoteke',
            "required" => 'Polje :attribute je obavezno',
            "not_in" => 'Izaberite galeriju'
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);
        $validator->validate();

        $photo = $request->file('file');
        $tmp = $photo->getPathName();
        $ext = $photo->getClientOriginalExtension();
        $namePhoto = time().'.'.$ext;
        $newPath = 'images/gallery/'.$namePhoto;
        $serverPath = public_path($newPath);

        File::move($tmp, $serverPath);


        $this->model->gallery_id = $request->get('gallery');
        $this->model->alt = $request->get('alt');
        $this->model->src = $newPath;

        try
        {
            $res = $this->model->insert();

            if ($res)
            {
                return redirect()->back()->with('success', 'Uspesno ste dodali sliku');
            }
            else
            {
                return redirect()->back()->with('error', 'Greska pri dodavanju slike');
            }
        }
        catch (QueryException $e)
        {
            \Log::error('Greska pri dodavanju slike' . $e->getMessage());
            return redirect()->back()->with('error', 'Greska pri dodavanju slike');
        }
    }

    public function showOne($id)
    {
        $this->model->gallery_id = $id;

        $this->data['images'] = $this->model->getImages();

        return view('admin.pages.images',$this->data);
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
                return redirect('/admin/images');
            }
        }
        catch (QueryException $e)
        {
            \Log::error('Greska pri brisanju slike' . $e->getMessage());
            return redirect()->back()->with('error', 'Greska pri brisanju slike');
        }
    }
}