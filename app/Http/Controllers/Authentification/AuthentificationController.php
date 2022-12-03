<?php

namespace App\Http\Controllers\Authentification;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthentificationController extends Controller
{

    public function index()
    {
        //Página de inicio
            return view('content');
    }

    public function login()
    {
        //Verifico que la sesión sigo activa o que el usuario este logueado
        if (Auth::check()) {
            if(Auth::user()->admin == 1){
                return redirect('/new-list');
            }
            return redirect('/');
        } else {
            return view('login.login');
        }
    }

    public function register()
    {
        //Vista del registro
        return view('login.register');
    }

    public function saveRecording(Request $request)
    {
        //Validación del formulario
        $validation = Validator::make($request->all(), [
            'name' => 'required', 'string',
            'last_name' => 'required', 'string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        //Si retorna error redireccionar a la vista de alta con el mensaje de error
        if ($validation->fails()) {
            return redirect()->back()->with('error', 'The email is already in use.')->withInput();
        }

        //Utilizo transaction para que no se genere el error si marca un error
        DB::transaction(function () use ($request) {
            $user = $request->only(['name', 'last_name', 'email']);
            $user['password'] = bcrypt($request->password);
            $user['admin'] = 0;
            $user['token'] = $request->_token;
            $user['status'] = 1;
            $user['created_at'] = Carbon::now();
            $user['updated_at'] = Carbon::now();
            $userId = User::insertGetId($user);

        });

        return redirect('/access')->with('register', 'Register success');
    }
}
