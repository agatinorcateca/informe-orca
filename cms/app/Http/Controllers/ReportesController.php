<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\Reportes;
use App\Blog;
use App\Administradores;
use App\Prueba;
use App\Aqua;
use App\Multi;
use App\Aysen;
use App\Austral;
use Carbon\Carbon;

use App\Exports\AquasExport;
use App\Exports\PruebasExport;
use App\Exports\MultisExport;
use App\Exports\AysensExport;
use Maatwebsite\Excel\Facades\Excel;


class ReportesController extends Controller
{
	public function index(Request $request){

		$reportes = Reportes::all();
		//$prueba = Prueba::all();
		$administradores = Administradores::all();

     
	return view('paginas.reportes');

    }

    public function exportprueba(Request $req)
    {
        $method = $req->method();

        if ($req->isMethod('post'))
        {
            $from = $req->input('from');
            $to   = $req->input('to');
            if($req->has('exportExcel'))
                        
                // select Excel
                return Excel::download(new PruebasExport($from, $to), 'Excel-reports.xlsx');
            {
        } 
        }
        
    }    

	public function exportaqua(Request $req)
    {
        $method = $req->method();

        if ($req->isMethod('post'))
        {
            $from = $req->input('from');
            $to   = $req->input('to');
            if($req->has('exportExcel'))
                        
                // select Excel
                return Excel::download(new AquasExport($from, $to), 'Aqua-reports.xlsx');
            {
        } 
        }
        
    }   

	public function exportmulti(Request $req)
    {
        $method = $req->method();

        if ($req->isMethod('post'))
        {
            $from = $req->input('from');
            $to   = $req->input('to');
            if($req->has('exportExcel'))
                        
                // select Excel
                return Excel::download(new MultisExport($from, $to), 'Multi-reports.xlsx');
            {
        } 
        }
        
    }   

	public function exportaysen(Request $req)
    {
        $method = $req->method();

        if ($req->isMethod('post'))
        {
            $from = $req->input('from');
            $to   = $req->input('to');
            if($req->has('exportExcel'))
                        
                // select Excel
                return Excel::download(new AysensExport($from, $to), 'Aysen-reports.xlsx');
            {
        } 
        }
        
    } 

		/*metodo mostrar total de registro por cliente.
		public function exportaqua(){
				return Excel::download(new AquasExport, 'Reporte-aqua.xlsx');
		}
		*/

 

}