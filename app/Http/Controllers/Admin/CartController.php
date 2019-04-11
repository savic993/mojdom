<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 8/12/2018
 * Time: 12:27
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Cart;
use Illuminate\Database\QueryException;

class CartController extends Controller
{
    private $model;
    private $data;

    public function __construct()
    {
        $this->model = new Cart();
    }

    public function delete($id)
    {
        $this->model->id = $id;

        try
        {
            $res = $this->model->deleteCart();

            if ($res)
            {
                return redirect()->back();
            }
        }
        catch (QueryException $e)
        {
            \Log::error('Greska pri brisanju narudzbine' . $e->getMessage());
            return redirect()->back()->with('error', 'Greska pri brisanju narudzbine');
        }
    }
}