<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

// For using the request -> copy the complete url
use App\Http\Requests\categoryRequest;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Listar todas las categorias activas
        $category = Categoria::all()->where('status',1);
        return view('admin.categoria.index')->with('category',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(categoryRequest $request)
    {
        $category = new Categoria;
        $category->name = $request->name;
        $category->save();

        session()->flash('status',
                          [ 
                            'message' =>'Registro guardado exitosamente',
                            'color' => 'success']);
        
        // utilice action porque asi me ahorro de hacer desde este procedimiento lo mismo
        // que el index
        return redirect()->action('CategoriaController@index');
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
        $category = Categoria::find($id);
        return view('admin.categoria.edit')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(categoryRequest $request, $id)
    {
        $category = Categoria::find($id);
        $category->name = $request->name;
        $category->save();

        session()->flash('status',
                          [ 
                            'message' =>'Registro editado exitosamente',
                            'color' => 'success']);
        
        // utilice action porque asi me ahorro de hacer desde este procedimiento lo mismo
        // que el index
        return redirect()->action('CategoriaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categoria::find($id);
        $category->delete();

        session()->flash('status',
                          [ 
                            'message' =>'Registro eliminado exitosamente',
                            'color' => 'warning']);
        
        // utilice action porque asi me ahorro de hacer desde este procedimiento lo mismo
        // que el index
        return redirect()->action('CategoriaController@index');
    }
}
