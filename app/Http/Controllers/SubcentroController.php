<?php

namespace App\Http\Controllers;

use App\Subcentro;
use Illuminate\Http\Request;

class SubcentroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Listar los subcentros
        $subcentro = Subcentro::get();
        echo json_encode($subcentro);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //insertar subcentro
       $subcentro = new Subcentro();
       $subcentro->nombre_sub = $request->nombre_sub;
       $subcentro->save();
       echo json_encode($subcentro);
       return redirect('subcentro')->with('success', 'Subcentro agregado correctamente' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Mostrar centro indicado en id
        return Subcentro::find($id);
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
    public function update(Request $request, $id)
    {
        //editar un centro por su id
        $subcentro = Subcentro::find($id);
        $subcentro->nombre_sub = $request->nombre_sub;
        $subcentro->save();
        echo json_encode($subcentro);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //eliminar centro por su id
        $subcentro = Subcentro::find($id);
        $subcentro->delete();
    }
}
