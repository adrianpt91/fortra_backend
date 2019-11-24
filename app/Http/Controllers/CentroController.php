<?php

namespace App\Http\Controllers;

use App\Centro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class CentroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Listar los centros
        //$centro = Centro::get();
        //echo json_encode($centro);

        //$centros = Centro::all();
        $centros = Centro::with('subcentros')->get();
        $data = $centros->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Centros recuperados satisfactoriamente.'
        ];

        return response()->json($response, 200);
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
       //insertar centro
       $centro = new Centro();
       $centro->nombre_centro = $request->nombre_centro;
       $centro->codigo = $request->codigo;
       $centro->save();
       echo json_encode($centro);
       return redirect('centro')->with('success', 'Centro agregado correctamente' );
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
        return Centro::find($id);
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
        $centro = Centro::find($id);
        $centro->nombre_centro = $request->nombre_centro;
        $centro->codigo = $request->codigo;
        $centro->save();
        echo json_encode($centro);
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
        $centro = Centro::find($id);
        $centro->delete();
    }
}
