<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\cliRequest;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cli = Cliente::all()->where('status',1);
        return view('admin.cliente.index')->with('cli',$cli);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(cliRequest $request)
    {
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        // Assigning new password witn the hash of laravel
        $user->password = Hash::make($request->password);
        $user->rol = 'C';
        $user->save();

        $cli = new Cliente;
        $cli->name = $request->name;
        $cli->lastname = $request->lastname;
        $cli->address = $request->address;
        $cli->phoneNumber = $request->phoneNumber;
        $cli->gender = $request->gender;

        $user->cliente()->save($cli);

        session()->flash('status',
                        ['color' => 'info', 
                         'message' => 'Registro guardado exitosamente']);

        return redirect()->action('ClienteController@index');
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
        $cli = Cliente::find($id);
        return view('admin.cliente.edit')->with('cli',$cli);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(cliRequest $request, $id)
    {
        $cli = Cliente::find($id);
        $cli->name = $request->name;
        $cli->lastname = $request->lastname;
        $cli->address = $request->address;
        $cli->phoneNumber = $request->phoneNumber;
        $cli->gender = $request->gender;

        $cli->save();

        session()->flash('status',
                        ['color' => 'info', 
                         'message' => 'Registro editado exitosamente']);

        return redirect()->action('ClienteController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cli = Cliente::find($id);
        $cli->status = false;
        $cli->save();

        session()->flash('status',
                        ['color' => 'warning', 
                         'message' => 'Registro eliminado exitosamente']);
        
        return redirect()->action('ClienteController@index');
    }
}
