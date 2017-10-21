<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Pelicula;
use App\Models\Categoria;
use App\Http\Requests\peliculaRequest;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Pelicula::where('status','!=','E')->paginate(5);
        return view('admin.pelicula.index')->with('peliculas', $peliculas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categoria::all()->where('status',1);
        return view('admin.pelicula.create')->with('category',$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(peliculaRequest $request)
    {
        $pelicula = new Pelicula;
        $pelicula->categoria_id = $request->categoria_id;
        $pelicula->name = $request->name;
        $pelicula->description = $request->description;
        $pelicula->fechaLanz = $request->fechaLanz;
        $pelicula->status = 'D';

        // Know if exist any file
        if(Input::hasfile('image'))
        {
            // get data
            $file = $request->file('image');

            // Función time captura un periodo de tiempo en segundos.
            // getClientOriginalExtension -> obtiene la extension de la imagen
            $name = 'pelicula_' . time() . '.' . $file->getClientOriginalExtension();

            // Definiendo la ruta donde se guardaran las imagenes
            // public_path : obtiene la direccion del directorio del proyecto
            $path = public_path() . '\imagenes';

            // move image to path with that name
            $file->move($path,$name);

            // save as string the image, for retrieving the image into of the carpet
            $pelicula->image =  $name;
        }

        $pelicula->save();

        session()->flash('status',
                        ['color' => 'info', 
                         'message' => 'Registro guardado exitosamente']);

        return redirect()->action('PeliculaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelicula = Pelicula::find($id);
        $category = Categoria::all()->where('status',1);
        return view('admin.pelicula.edit')->with('pelicula',$pelicula)
                                          ->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(peliculaRequest $request, $id)
    {
        $pelicula = Pelicula::find($id);
        $pelicula->categoria_id = $request->categoria_id;
        $pelicula->name = $request->name;
        $pelicula->description = $request->description;
        $pelicula->fechaLanz = $request->fechaLanz;

        // Know if exist any file
        if(Input::hasfile('image'))
        {
            // get data
            $file = $request->file('image');

            // Función time captura un periodo de tiempo en segundos.
            // getClientOriginalExtension -> obtiene la extension de la imagen
            $name = 'pelicula_' . time() . '.' . $file->getClientOriginalExtension();

            // Definiendo la ruta donde se guardaran las imagenes
            // public_path : obtiene la direccion del directorio del proyecto
            $path = public_path() . '\imagenes';

            // move image to path with that name
            $file->move($path,$name);

            // save as string the image, for retrieving the image into of the carpet
            $pelicula->image =  $name;
        }

        $pelicula->save();

        session()->flash('status',
                        ['color' => 'info', 
                         'message' => 'Registro editado exitosamente']);

        return redirect()->action('PeliculaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelicula = Pelicula::find($id);

        $mensaje = array('color' => 'warning',
                         'message' => 'La pelicula seleccionada se encuentra rentada actualmenta.');

        if($pelicula->status == 'D')
        {
           $pelicula->status = 'E';
           $pelicula->save();

           $message['color'] = 'info'; 
           $message['message'] = 'Registro eliminado correctamente';             
        }

        session()->flash('status', $mensaje);
        return redirect()->action('PeliculaController@index');
    }
}
