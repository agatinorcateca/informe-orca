<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aqua;
Use App\Administradores;
use App\Multi;
use App\Aysen;
use App\Austral;
use Carbon\Carbon;

class PDFController extends Controller
{
    //Aqua
    public function PDF(){

       // $aqua = Aqua::all();
        $aqua = Aqua::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->get();

        $pdf = \PDF::loadView('aquapdf', compact('aqua'));
        return $pdf->stream('aquapdf.pdf');
    }

    //multi
    public function PDFmulti(){
           // muestra todos los registros
           //  $multi = Multi::all();
          //IMprime en el pdf x dia.
           $multi = Multi::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->get();    
               
       $pdf = \PDF::loadView('multipdf', compact('multi'));
        return $pdf->stream('multipdf.pdf');
    }

    //aysen
    public function PDFaysen(){
       //muestra todos los registros
       //      $aysen = Aysen::all();
       //muestra registros de fecha actual
       $aysen = Aysen::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->get();

        $pdf = \PDF::loadView('aysenpdf', compact('aysen'));
        return $pdf->stream('aysenpdf.pdf');
    }

    //autral
    public function PDFaustral(){

       // $austral = Austral::all();
        $austral = Austral::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->get();

        $pdf = \PDF::loadView('australpdf', compact('austral'));
        return $pdf->stream('australpdf.pdf');
    }


}
