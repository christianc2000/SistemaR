<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Trabajador;
use App\Models\User;
use Spatie\Permission\Models\Role;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.create')->only('create', 'store');
        $this->middleware('can:users.edit')->only('edit', 'update');
        $this->middleware('can:users.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        $roles = Role::all();

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

        $users = new User();
        $users->name = $request->get('name');
        $users->email = $request->get('email');
        $users->password = bcrypt($request->get('password'));
        $users->ci_trab = $request->get('ci_trab');
        $users->save();
        $users->assignRole($request->rol); //crear rol
        // $users->syncRoles($request->rol);//sincronizar rol
        //    return redirect()->route('users.edit', $user)->with('info', 'Se asignó los roles correctamente');
        // User::create($request->all());
        return redirect()->route('users.index')->with('info', 'Se creó un nuevo usuario'); //redirige a la vista index de la carpeta cargo
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
        $roles = Role::all();
        // return view('user.editarRol',compact('user', 'roles'));
        $users = User::all();

        return view('user.edit', compact('user', 'users', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $ci)
    {
        // public function update(Request $request,User $user)

        //     $user->roles()->sync($request->roles);
        //    return redirect()->route('users.edit', $user)->with('info', 'Se asignó los roles correctamente');
        $user = User::find($ci);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        if ($request->password != 'xxxxxxxxx') {
            $user->password = bcrypt($request->get('password'));
        }
        $user->ci_trab = null;
        $user->save();
        $user->ci_trab = $request->get('ci_trab');
        $user->save();
        $user->syncRoles($request->rol); //sincronizar rol
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
