<?php

namespace App\Http\Controllers;

use App\Contrato;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$contratos = Contrato::all();
        $contratos = Contrato::with('trabajador', 'centro', 'cargo')->get();
        $data = $contratos->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Contratos recuperados satisfactoriamente.'
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
        $input = $request->all();

        $validator = Validator::make($input, [
            'codigo_contrato' => 'required',
            'tipo_contrato' => 'required',
            'trabajador_id' => 'required',
            'centro_id' => 'required',
            'cargo_id' => 'required'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }

        $contrato = Contrato::create($input);
        $data = $contrato->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Contrato insertado correctamente.'
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
        $contrato = Contrato::find($id);
        $data = $contrato->toArray();

        if (is_null($contrato)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Contrato no encontrado.'
            ];
            return response()->json($response, 404);
        }


        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Contrato recuperado satisfactoriamente.'
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
        $contrato = Contrato::find($id);
        $contrato->codigo_contrato = $request->codigo_contrato;
        $contrato->tipo_contrato = $request->tipo_contrato;
        $contrato->fecha_alta = $request->fecha_alta;
        $contrato->fecha_baja = $request->fecha_baja;
        $contrato->motivo_baja = $request->motivo_baja;
        $contrato->trabajador_id = $request->trabajador_id;
        $contrato->centro_id = $request->centro_id;
        $contrato->cargo_id = $request->cargo_id;
        $contrato->save();
        echo json_encode($contrato);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contrato = Contrato::find($id);
        $contrato->delete();
    }
}
