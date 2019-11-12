<?php

namespace App\Http\Controllers;

use App\DatosMilitares;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class DatosMilitaresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Listar los datos militares
        //$datos_militares = DatosMilitares::get();
        //echo json_encode($datos_militares);

        $datos_militares = DatosMilitares::all();
        $data = $datos_militares->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Datos recuperados satisfactoriamente.'
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
        //insertar dato militar
       $datos_militares = new DatosMilitares();
       $datos_militares->nombre_unidad = $request->nombre_unidad;
       $datos_militares->fecha_alta = $request->fecha_alta;
       $datos_militares->save();
       echo json_encode($datos_militares);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Mostrar datos militares indicado en id
        return DatosMilitares::find($id);
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
        //editar datos militares por su id
        $datos_militares = DatosMilitares::find($id);
        $datos_militares->nombre_unidad = $request->nombre_unidad;
        $datos_militares->fecha_alta = $request->fecha_alta;
        $datos_militares->save();
        echo json_encode($datos_militares);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //eliminar dato por su id
        $datos_militares = DatosMilitares::find($id);
        $datos_militares->delete();
    }
}
