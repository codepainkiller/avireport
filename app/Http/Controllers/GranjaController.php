<?php namespace AviReport\Http\Controllers;

use AviReport\Entities\Granja;
use AviReport\Http\Requests;
use AviReport\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class GranjaController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $user_id = Auth::user()->id;

        $granjas = \DB::table('granjas')
                        ->join('users', 'granjas.user_id', '=', 'users.id')
                        ->select('granjas.*', 'users.name as owner')
                        ->where('user_id', $user_id)
                        ->get();

		return view('admin/granja/index', compact('granjas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('admin/granja/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $inputs = Input::all();

        Granja::create([
            'name'          => $inputs['name'],
            'address'       => $inputs['address'],
            'number_phone'  => $inputs['number_phone'],
            'owner_name'    => $inputs['owner_name'],
            'user_id'       => Auth::user()->id
        ]);

        return Redirect::route('granja.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{/*
        \DB::table('granjas')
            ->join('users', 'granjas.user_id', '=', 'users.id')
            ->select('granjas.*', 'users.name as owner')
            ->where('user_id', $user_id)
            ->get();*/

        $granja = Granja::find($id);

        $galpones = \DB::table('granjas')
                    ->join('galpons', 'granjas.id', '=', 'galpons.granja_id')
                    ->select('galpons.*')
                    ->where('granjas.id', $id)
                    ->get();

        //dd($granja);

		return view('admin/granja/show', compact('granja', 'galpones'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $granja = Granja::find($id);

        return view('admin/granja/edit', compact('granja'));
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
        $granja = Granja::find($id);

        $request = $granja->update($inputs);

        if ($request)
        {
            return Redirect::route('granja.show', $id);
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
        $granja = Granja::find($id);
        $granja->delete();

		if($request->ajax())
        {
            return response()->json([
                'id'    => $id,
                'message'  => "Granja <b>".$granja->name."</b> fue eliminada"
            ]);
        }
	}

}
