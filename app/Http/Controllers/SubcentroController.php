<?php

namespace App\Http\Controllers;

use App\Subcentro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

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

        //$subcentro = Subcentro::all();
        $subcentro = Subcentro::with('centro')->get();
        $data = $subcentro->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Subcentros recuperados satisfactoriamente.'
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
       //insertar subcentro
        
        $input = $request->all();

        $validator = Validator::make($input, [
            'centro_id' => 'required',
            'codigo_sub' => 'required',
            'nombre_subcentro' => 'required'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }

        $subcentro = Subcentro::create($input);
        $data = $subcentro->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Subcentro insertado correctamente.'
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
        //Mostrar centro indicado en id

        $subcentro = Subcentro::find($id);
        $data = $subcentro->toArray();

        if (is_null($subcentro)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Subcentro no encontrado.'
            ];
            return response()->json($response, 404);
        }


        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Subcentro recuperado satisfactoriamente.'
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
