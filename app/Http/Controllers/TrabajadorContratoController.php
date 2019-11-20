<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Trabajadores;
use App\Contrato;

use Response;

class TrabajadorContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idTrabajador)
    {
        // Devolverá el contrato de un trabajador.
		//return "Mostrando el contrato del trabajador con Id $idTrabajador";
		$trabajador=Trabajadores::find($idTrabajador);

		if (! $trabajador)
		{
			// Se devuelve un array errors con los errores encontrados y cabecera HTTP 404.
			return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra un trabajador con ese código.'])],404);
		}

		return response()->json(['status'=>'ok','data'=>$trabajador->contrato()->get()],200);


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
    public function store(Request $request, $idTrabajador)
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

        $trabajador=Trabajadores::find($idTrabajador);

		if (! $trabajador)
		{
			// Se devuelve un array errors con los errores encontrados y cabecera HTTP 404.
			return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra un trabajador con ese código.'])],404);
        }
        
        //$contrato=$trabajador->contrato()->create($input);
        $contrato = Contrato::create($input);
        $data = $contrato->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Contrato insertado correctamente.'
        ];

        return response()->json($response, 201);
    }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
