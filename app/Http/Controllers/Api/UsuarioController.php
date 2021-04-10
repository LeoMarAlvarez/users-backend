<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return request();
        return Usuario::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nombre'=>'required',
            'apellido'=>'required',
            'usuario'=>'required|unique:usuarios,usuario',
            'email'=>'required|unique:usuarios,email'
        ]);
        try {
            DB::beginTransaction();
            $us = Usuario::create($request->all());
            DB::commit();
            return response()->json([
                'usuario'=>$us
            ],200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'error'=>"No se pudo guardar el registro ".$th->getMessage()
            ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        // $usuario = Usuario::find($id);
        return response()->json($usuario,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        $validateData = $request->validate([
            'nombre'=>'required',
            'apellido'=>'required',
            'usuario'=>'required|unique:usuarios,usuario,'.$usuario->id,
            'email'=>'required|unique:usuarios,email,'.$usuario->id
        ]);
        try {
            DB::beginTransaction();
            $usuario->nombre = $request->nombre;
            $usuario->apellido = $request->apellido;
            $usuario->usuario = $request->usuario;
            $usuario->email = $request->email;
            $usuario->save();
            DB::commit();
            return response()->json([
                'usuario'=>$usuario
            ],200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'error'=>'No se pudo guardar el registro '.$th->getMessage()
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        try {
            DB::beginTransaction();
            $usuario->delete();
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollback();
            return false;
        }
    }
}
