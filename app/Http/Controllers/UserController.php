<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Trabajador;
use App\Models\User;
use Spatie\Permission\Models\Role;


use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::all();

        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=Trabajador::join('personas','personas.ci', '=', 'trabajadors.ci_trabajador')
        ->join("Cargos","Cargos.codigo","=","trabajadors.cod_cargo")
        ->leftJoin('users', 'users.ci_trab', '=', 'trabajadors.ci_trabajador')
        ->select('personas.ci','personas.nombre','personas.apellido as ap')
        ->where('cargos.perfil_usuario','=', 1)
        ->whereNull('users.ci_trab')
        ->get();

        $roles=Role::all();
        
        return view('user.create', compact('users', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        
        $users= new User();
        $users->name=$request->get('name');
        $users->email=$request->get('email');
        $users->password=bcrypt($request->get('password'));
        $users->ci_trab=$request->get('ci_trab');
        $users->save();
        // User::create($request->all());
        return redirect()->route('users.index');//redirige a la vista index de la carpeta cargo
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
    public function edit(User $user)
    {
        //*** asignar rol */
        // $roles=Role::all();
        // return view('user.editarRol',compact('user', 'roles'));
        $users=Trabajador::join('personas','personas.ci', '=', 'trabajadors.ci_trabajador')
        ->join("Cargos","Cargos.codigo","=","trabajadors.cod_cargo")
        ->leftJoin('users', 'users.ci_trab', '=', 'trabajadors.ci_trabajador')
        ->select('personas.ci','personas.nombre','personas.apellido as ap')
        ->where('cargos.perfil_usuario','=', 1)
        ->whereNull('users.ci_trab')
        // ->where('users.ci_trab','=', 'trabajadors.ci_trabajador')
        ->get();

        return view('user.edit',compact('user', 'users'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request,$ci)
    {
    //     $user->roles()->sync($request->roles);
    //    return redirect()->route('users.edit', $user)->with('info', 'Se asignó los roles correctamente');
        $user=User::find($ci);
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->password=$request->get('password');
        $user->ci_trab=null;
        $user->save();
        $user->ci_trab=$request->get('ci_trab');
        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
