<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth"); // Protegemos las rutas solo si estan logeados
        $this->middleware("check_bann"); // Valida que este activo el usuario
    }
    
    public function all(){
        return User::all();
    }
}
