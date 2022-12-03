<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator; // agregar el facade de validator
use Illuminate\Contracts\Encryption\DecryptException; //facade para cachar los errores de decrypt

class NewsController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth"); // Protegemos las rutas solo si estan logeados
        $this->middleware("check_bann"); // Valida que este activo el usuario
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Traemos todas la noticias y las mandamos a la vista
        $news = News::select('id', 'name', 'status', 'image', 'created_at')->get();

        return view('admin.list_news', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validar = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,bmp,png,jpg' //Genero las extensiones validas para una imagen de perfil

        ]);
        //Si retorna error redireccionar a la vista de alta con el mensaje de error
        if ($validar->fails()) {
            return redirect()->back()->with('error', 'All data is required');
        }

        if ($request->hasFile('image')) {
            $imageNew = time() . '.' . request()->image->getClientOriginalExtension();
            $image = $request->file('image')->move('/news', $imageNew);
        } else {
            return redirect()->back()->with('error', 'All data is required');
        }

        //Utilizo transaction para que no se genere el error si marca un error
        DB::transaction(function () use ($request, $image) {
            $new = new News;
            $new->name = trim($request->name);
            $new->description = trim($request->description);
            $new->priority = trim($request->priority);
            $new->image = $image;
            $new->status = 1;
            $new->created_at = Carbon::now();
            $new->updated_at = Carbon::now();
            $new->save();
        });
        return redirect()->back()->with('create', 'News created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $newDetails = News::select('id', 'name', 'description', 'image', 'priority')->where('id', Crypt::decryptString($id))->first();
        return view('admin.show_new', compact('newDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            decrypt($id, false); // se pone en false porque solo permitia 8 bytes: https://stackoverflow.com/questions/51763473/laravel-decrypt-errorexception-unserialize-error-at-offset-0-of-2-bytes
        } catch (DecryptException $e) {
            return view('errors.404');
        }

        $newDetails = News::select('id', 'name', 'description', 'image', 'priority')->where('id', Crypt::decryptString($id))->first();

        return view('admin.edit_new', compact('newDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validar = Validator::make($request->all(), [
            'name' => ['required'],
            'description' => 'required',
            'image' => 'mimes:jpeg,bmp,png,jpg' //Genero las extensiones validas para una imagen de perfil

        ]);
        //Si retorna error redireccionar a la vista de alta con el mensaje de error
        if ($validar->fails()) {
            return redirect()->back()->with('error', 'All data is required');
        }

        if ($request->hasFile('image')) {
            $imageNew = time() . '.' . request()->image->getClientOriginalExtension();
            $image = $request->file('image')->move('/news', $imageNew);
        }

        DB::transaction(function () use ($request, $id,$image) {
            $new = News::findOrFail($id);
            $new->name = $request->name;
            $new->description = $request->description;
            $new->image = $request->image;
            $new->description = $request->description;
            $new->priority = $request->priority;
            $new->status = 1;
            $new->created_at = Carbon::now();
            $new->updated_at = Carbon::now();
            $new->save();
        });

        return redirect('/new-list')->with('status', 'New updaated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::where('id', $id)->first();
        if ($new->status == 1) {
            $new->status = 0;
            $mensaje = "New disabled";
        } else {
            $new->status = 1;
            $mensaje = "New Active";
        }
        $new->save();
        return redirect()->back()->with('status', $mensaje);
    }
}
