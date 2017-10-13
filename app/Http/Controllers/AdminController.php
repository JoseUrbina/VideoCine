<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrador;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\adminRequest;
use App\Http\Requests\adminuRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Administrador::all()->where('status',1);
        return view('admin.padmin.index')->with('admin',$admin);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.padmin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(adminRequest $request)
    {
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        // Assigning new password witn the hash of laravel
        $user->password = Hash::make($request->password);
        $user->save();

        $admin = new Administrador;
        $admin->cedula = $request->cedula;
        $admin->name = $request->name;
        $admin->lastname = $request->lastname;
        $admin->address = $request->address;
        $admin->phoneNumber = $request->phoneNumber;
        $admin->gender = $request->gender;

        $user->administrador()->save($admin);

        session()->flash('status',
                        ['color' => 'info', 
                         'message' => 'Registro guardado exitosamente']);

        return redirect()->action('AdminController@index');

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
        $admin = Administrador::find($id);
        return view('admin.padmin.edit')->with('admin', $admin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(adminuRequest $request, $id)
    {      
        $admin = Administrador::find($id);
        $admin->cedula = $request->cedula;
        $admin->lastname = $request->lastname;
        $admin->address = $request->address;
        $admin->phoneNumber = $request->phoneNumber;
        $admin->gender = $request->gender;

        $admin->save();

        session()->flash('status',
                        ['color' => 'info', 
                         'message' => 'Registro editado exitosamente']);

        return redirect()->action('AdminController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Administrador::find($id);
        $admin->status = false;
        $admin->save();

        session()->flash('status',
                        ['color' => 'warning', 
                         'message' => 'Registro eliminado exitosamente']);

        return redirect()->action('AdminController@index');
    }
}
