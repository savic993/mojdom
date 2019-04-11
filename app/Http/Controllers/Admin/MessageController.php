<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 8/14/2018
 * Time: 18:43
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Message;

class MessageController extends Controller
{
    private $model;
    private $data;

    public function __construct()
    {
        $this->model = new Message();
    }

    public function inboxDelete($id)
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
            \Log::error('Greska pri brisanju poruke' . $e->getMessage());
            return redirect()->back()->with('error', 'Greska pri brisanju poruke');
        }
    }
}