<?php namespace AviReport\Http\Controllers;

use AviReport\Entities\Control;
use AviReport\Entities\Galpon;
use AviReport\Entities\Granja;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
        $controls = Control::get();
        $numControls = 0;

        foreach($controls as $control)
        {
            $numControls += $control->week;
        }

        $info = [
            'numGalpons'  => Galpon::count(),
            'numGranjas'  => Granja::count(),
            'numControls' => $numControls
        ];

		return view('admin/dashboard', compact('info'));
	}

    public function getIngresoDatos()
    {
        return view('admin/ingreso_datos');
    }

    public function getObservaciones()
    {
        return view('admin/observaciones');
    }

    public function getReporte()
    {
        return view('admin/reporte');
    }

    public  function getPromedio() {

        $promedio = Input::get('promedio');
        //dd($promedio);
        return View::make('admin/reporte', compact('promedio'));
    }
}
