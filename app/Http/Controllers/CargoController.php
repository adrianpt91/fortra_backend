<?php

namespace App\Http\Controllers;

use App\Cargo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Listar los cargos
        //$cargo = Cargo::get();
        //echo json_encode($cargo);

        $cargo = Cargo::all();
        $data = $cargo->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Cargos recuperados satisfactoriamente.'
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
        //insertar cargo
        /*
        $cargo = new Cargo();
        $cargo->nombre_cargo = $request->nombre_cargo;
        $cargo->save();

        return redirect('cargo')->with('success', 'Cargo agregado correctamente' );
        echo json_encode($cargo);*/

        $input = $request->all();

        $validator = Validator::make($input, [
            'nombre_cargo' => 'required'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }

        $cargo = Cargo::create($input);
        $data = $cargo->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Cargo insertado correctamente.'
        ];

        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Mostrar cargo indicado en id
        return Cargo::find($id);
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
        //editar un cargo por su id
        $cargo = Cargo::find($id);
        $cargo->nombre_cargo = $request->nombre_cargo;
        $cargo->save();
        echo json_encode($cargo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //eliminar cargo por su id
        $cargo = Cargo::find($id);
        $cargo->delete();
    }
}
