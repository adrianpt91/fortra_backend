<?php

namespace App\Http\Controllers;

use App\Trabajadores;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class TrabajadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Listar los trabajadores
        //$trabajadores = Trabajadores::get();
        //echo json_encode($trabajadores);

        $trabajadores = Trabajadores::all();
        $data = $trabajadores->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Trabajadores recuperados satisfactoriamente.'
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
        //insertar trabajador
        /*
        $trabajador = new Trabajadores();
        $trabajador->ci = $request->ci;
        $trabajador->first_name = $request->first_name;
        $trabajador->last_name = $request->last_name;
        $trabajador->municipio = $request->municipio;
        $trabajador->provincia = $request->provincia;
        $trabajador->adress = $request->adress;
        $trabajador->sexo = $request->sexo;
        $trabajador->militancia = $request->militancia;
        $trabajador->ec = $request->ec;
        $trabajador->save();
        echo json_encode($trabajador);*/

        $input = $request->all();

        $validator = Validator::make($input, [
            'ci' => 'required',
            'first_name' => 'required',
            'last_name' => 'required'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }

        $trabajador = Trabajadores::create($input);
        $data = $trabajador->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Trabajador insertado correctamente.'
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
        //Mostrar trabajador indicado en id
        //return Trabajadores::find($id);

        $trabajador = Trabajadores::find($id);
        $data = $trabajador->toArray();

        if (is_null($trabajador)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Trabajador no encontrado.'
            ];
            return response()->json($response, 404);
        }


        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Trabajador recuperado satisfactoriamente.'
        ];

        return response()->json($response, 200);
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
        //editar un trabajador por su id
        
        $trabajador = Trabajadores::find($id);
        $trabajador->ci = $request->ci;
        $trabajador->first_name = $request->first_name;
        $trabajador->last_name = $request->last_name;
        $trabajador->municipio = $request->municipio;
        $trabajador->provincia = $request->provincia;
        $trabajador->adress = $request->adress;
        $trabajador->sexo = $request->sexo;
        $trabajador->militancia = $request->militancia;
        $trabajador->ec = $request->ec;
        $trabajador->save();
        echo json_encode($trabajador);

        /*
        $input = $request->all();

        $validator = Validator::make($input, [
            'ci' => 'required',
            'first_name' => 'required',
            'last_name' => 'required'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }

        $trabajador->ci = $input['ci'];
        $trabajador->first_name = $input['first_name'];
        $trabajador->last_name = $input['last_name'];
        $trabajador->municipio = $input['municipio'];
        $trabajador->provincia = $input['provincia'];
        $trabajador->adress = $input['adress'];
        $trabajador->sexo = $input['sexo'];
        $trabajador->militancia = $input['militancia'];
        $trabajador->ec = $input['ec'];
        $trabajador->save();

        $data = $trabajador->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Trabajador actualizado correctamente.'
        ];

        return response()->json($response, 200);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //eliminar trabajador por su id
        $trabajador = Trabajadores::find($id);
        $trabajador->delete();

    	/*
        $trabajador->delete();
        $data = $trabajador->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Trabajador eliminado satisfactoriamente.'
        ];

        return response()->json($response, 200);*/
    }
}
