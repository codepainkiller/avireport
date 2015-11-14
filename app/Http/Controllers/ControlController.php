<?php namespace AviReport\Http\Controllers;

use AviReport\Entities\Control;
use AviReport\Http\Requests;
use AviReport\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PhpParser\Node\Expr\Cast\Object_;

class ControlController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return "View - Lista de controls de galpones";
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return "View - Creacion de control";
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
    {
        return "POST - Creando control para galpon";
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return "View - Mostrando informacion de control ".$id;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return "View - Editar informacion de control ".$id;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $inputs = Input::all();

        $controlGalpon = Control::find($id);
        $json = json_decode($controlGalpon->json_control);
        $date = new \DateTime('NOW');

        // Control semanal
        $control = new \stdClass();
        $control->week = $controlGalpon->week;
        $control->average_weight = $inputs['peso_promedio'];
        $control->state = $inputs['estado'];
        $control->observation = $inputs['observacion'];
        $control->date = date('Y-m-d');

        array_push($json->control, $control);
        $json->week++;
        $json->last_update = $date->format('Y-m-d');

        $controlGalpon->json_control = json_encode($json);
        $controlGalpon->week++;
        $controlGalpon->save();

		return $controlGalpon->json_control;

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return "Eliminacion logica control ".$id;
	}

}
