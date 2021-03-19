<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reportes;
use App\Blog;
use App\Administradores;
use App\Prueba;


class ReportesController extends Controller
{
    /*public function index(Request $request){

		$reportes = Reportes::all();
		$prueba = Prueba::all();
		$administradores = Administradores::all();

		if($request->ajax()){

			return datatables()->of($prueba)->make(true);

		}

		return view('paginas.reportes');
	}
	*/	
	public function index(Request $request){

		$reportes = Reportes::all();
		//$prueba = Prueba::all();
		$administradores = Administradores::all();

     if($request->ajax()){
           // request from_date value
		if(!empty($request->from_date))
		{
			if($request->from_date === $request->to_date){
				$prueba = Prueba::whereDate('created_at','=', $request->from_date)->get();
			
			}else{
				$prueba = Prueba::whereBetween('created_at', array($request->from_date, $request->to_date))->get();
			}
		}
		//load_data default
		else
		{
		$prueba = Prueba::all();
		}
        return datatables()->of($prueba)->make(true);
    }
	return view('paginas.reportes');

    }
}
