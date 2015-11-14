<?php namespace AviReport\Http\Controllers;

use AviReport\Entities\Control;
use AviReport\Entities\Galpon;
use AviReport\Http\Requests;
use AviReport\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class GalponController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{dd(Input::all());
		return view('admin/galpon/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $inputs = Input::all();
        $num = (int) ($inputs['num_galpones']);

        $date = new \DateTime('NOW');
        $jsonControl = new \stdClass();
        $jsonControl->week = $inputs['week'];
        $jsonControl->last_update = $date->format('Y-m-d');
        $jsonControl->control = [];

        for($i = 0; $i < $num; $i++)
        {
            $dateFormat = $date->format('Y-m-d');
            $timeFormat = $date->format('H:i:s');
            $code = "GALP-".str_replace("-", "", $dateFormat)."-".str_replace(":", "", $timeFormat);

            $galpon = Galpon::create([
                'code'          => $code,
                'number_birds'  => $inputs['number_birds'],
                'description'   => $inputs['description'],
                'granja_id'     => $inputs['granja_id']
            ]);

            Control::create([
                'json_control'  => json_encode($jsonControl),
                'description'   => "Galpon de gallinas ponedoras",
                'type'          => 'ponedoras',
                'week'          => $inputs['week'],
                'galpon_id'     => $galpon->id
            ]);
        }

		return Redirect::back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $galpon = Galpon::find($id);
        $jsonControl = json_decode($galpon->control->json_control);

        $nextUpdate = new \DateTime($jsonControl->last_update);
        $nextUpdate->add(new \DateInterval('P7D'));

        $jsonControl->next_update = $nextUpdate->format('Y-m-d');

		return view('admin/galpon/show', compact('galpon', 'jsonControl'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$galpon = Galpon::find($id);
        return view('admin/galpon/edit', compact('galpon'));
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
        $galpon = Galpon::find($id);

        $request = $galpon->update($inputs);

        if ($request)
        {
            return Redirect::route('galpon.show', $id);
        }

        return Redirect::back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{
        $galpon = Galpon::find($id);
        $galpon->delete();
        $message = "Galpón <b>".$galpon->code."</b> fue eliminado de la granja";

        if ($request->ajax())
        {
            return response()->json([
                'id'        => $id,
                'message'   => $message
            ]);
        }
	}

}
