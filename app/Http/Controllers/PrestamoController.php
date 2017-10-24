<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Pelicula;
use App\Models\Cliente;
use App\Http\Requests\prestamoRequest;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestamo = Prestamo::all()->where('status',1);
        return view('admin.prestamo.index')->with('prestamo', $prestamo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peliculas = Pelicula::all()->where('status','D');
        $cliente = Cliente::all()->where('status',1);
        return view('admin.prestamo.create')->with('peliculas',$peliculas)
                                            ->with('cliente',$cliente);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(prestamoRequest $request)
    {
        $prestamo = new Prestamo;
        $prestamo->cliente_id = $request->cliente_id;
        $prestamo->fechaPrestamo = $request->fechaPrestamo;
        $prestamo->fechaRegreso = $request->fechaRegreso;
        $prestamo->status = true;
        $prestamo->save();

        $pelicula = $request->pelicula_id;
        $i = 0;

        while($i < count($pelicula))
        {
            // attach () -> add elements to relationship many to many(detalle_prestamos)
            // paremeter -> array with elements of the table
            $prestamo->peliculas()->attach(['pelicula_id' => $pelicula[$i]]);

            // Changing status of pelicula by separating
            $p = Pelicula::find($pelicula[$i]);
            $p->status = 'R';
            $p->save();

            $i++;
        };

        return 'guardado';
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(prestamoRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
