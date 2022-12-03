<?php

namespace App\Http\Controllers\Plataform;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Views;
use Carbon\Carbon;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlataformNewsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth"); // Protegemos las rutas solo si estan logeados
        $this->middleware("check_bann"); // Valida que este activo el usuario
    }

    public function index()
    {
        //Id el usuario logueado
        $idUser = auth()->id();
        //Noticias más importantes
        $newsImp = News::select('id', 'name', 'description', 'image', 'status', 'created_at')
            ->where('priority', '=', '1')
            ->where('status', '=', 1)
            ->take(5)
            ->inRandomOrder()
            ->get();

        //Noticias sin prioridad
        $otherNews = News::select('id', 'name', 'description', 'image', 'status', 'created_at')
            ->where('priority', '=', '0')
            ->where('status', '=', 1)
            ->take(5)
            ->inRandomOrder()
            ->get();

        $visit = Views::select('id','pending')->where('id_user','=', 22)->get();

        return view('plataform.home', compact('otherNews', 'newsImp','visit'));
    }

    public function news(Request $request, $id)
    {
        //Id de la noticia
        $id = base64_decode($id);

        $visit = Views::select('id','id_user','id_new','pending')->where('id', '=', $id)->get();

            //Guardamos la visita del usuario
            DB::transaction(function () use ($request, $id) {
                $view = new Views();
                $view->id_user = auth()->id();
                $view->id_new = $id;
                $view->pending = 1;
                $view->created_at = Carbon::now();
                $view->updated_at = Carbon::now();
                $view->save();
            });


        $newDetails = News::select('id', 'name', 'description', 'image', 'priority')->where('id', '=', $id)->first();

        //Noticias más importantes
        $newsImp = News::select('id', 'name', 'description', 'image', 'status', 'created_at')
            ->where('priority', '=', '1')
            ->where('status', '=', 1)
            ->take(1)
            ->inRandomOrder()
            ->get();

        //Vista del cuerpo de la noticia
        return view('plataform.news', compact('newsImp','newDetails'));
    }
}
