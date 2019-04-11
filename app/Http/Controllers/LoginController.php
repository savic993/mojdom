<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Database\QueryException;

class LoginController extends Controller
{
    private $model = null;

    public function __construct()
    {
        $this->model = new User();
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => [
                'required',
                'min:6',
                'regex:/^[a-zA-Z\d]{6,}$/'
            ]
        ];

        $messages = [
            "password.regex" => 'Lozinka nije u dobrom formatu',
            "required" => 'Polje :attribute je obavezno',
            "email" => 'Email nije validan'
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);
        $validator->validate();

        $this->model->email = $request->get('email');
        $this->model->password = md5($request->get('password'));

        $user = $this->model->login();
        if(!empty($user))
        {
            if ($user->name == "korisnik")
            {
                $request->session()->push('user',$user);
                return redirect('/')->with('success', 'Mesto gde ulepsavate vas dom');

            }
            elseif ($user->name == "administrator")
            {
                $request->session()->push('user',$user);
                return redirect()->route('admin');
            }
        }
        else
        {
            return redirect()->back()->with('error', 'Uneli ste pogresno korisnicko ime ili lozinku');
        }

    }

    public function logout(Request $request){
        $request->session()->forget('user');
        $request->session()->flush();
        return redirect('/');
    }

    public function register(Request $request)
    {
        $rules = [
            'firstName' => 'required|alpha|min:2|max:20',
            'lastName' => 'required|alpha|min:2|max:20',
            'username' => 'required|unique:user,username',
            'email' => 'required|email|unique:user,email',
            'password' => [
                'required',
                'min:6',
                'regex:/^[a-zA-Z\d]{6,}$/'
            ]
        ];

        $messages = [
            "password.regex" => 'Lozinka nije u dobrom formatu',
            "required" => 'Polje :attribute je obavezno',
            "unique" => 'Polje je vec zauzeto, probajte ponovo',
            "email" => 'Email nije validan'
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);
        $validator->validate();

        $name = $request->get('firstName');
        $lastName = $request->get('lastName');
        $checkbox = $request->get('checkbox');

        if (!empty($checkbox))
        {
            $this->model->fullName = $name.' '.$lastName;
            $this->model->username = $request->get('username');
            $this->model->email = $request->get('email');
            $this->model->password = md5($request->get('password'));
            $this->model->role_id = 2;

            try
            {
                $user = $this->model->insert();

                if($user)
                {
                    return redirect()->back()->with('success', 'Uspesno ste se registrovali');
                }
                else
                {
                    return redirect()->back()->with('error', 'Greska pri registraciji');
                }
            }
            catch (QueryException $e)
            {
                \Log::error('Greska priregistraciji' . $e->getMessage());
                return redirect()->back()->with('error', 'Greska pri registraciji, pokusajte ponovo');
            }
        }
        else
        {
            return redirect()->back()->with('error', 'Morate prihvatiti pravila i uslove koriscenja aplikacije');
        }
    }
}
