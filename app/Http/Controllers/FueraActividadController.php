<?php

namespace App\Http\Controllers;

use App\FueraActividad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class FueraActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Listar las actividades
        //$fuera_actividad = FueraActividad::get();
        //echo json_encode($fuera_actividad);

        $fuera_actividad = FueraActividad::all();
        $data = $fuera_actividad->toArray();

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
        //insertar actividad
        $fuera_actividad = new FueraActividad();
        $fuera_actividad->name = $request->name;
        $fuera_actividad->save();
        echo json_encode($fuera_actividad);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Mostrar actividad indicado en id
        return FueraActividad::find($id);
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
        //editar una actividad por su id
        $fuera_actividad = FueraActividad::find($id);
        $fuera_actividad->name = $request->name;
        $fuera_actividad->save();
        echo json_encode($fuera_actividad);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //eliminar actividad por su id
        $fuera_actividad = FueraActividad::find($id);
        $fuera_actividad->delete();
    }
}
