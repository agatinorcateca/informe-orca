<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aqua;
Use App\Administradores;
use App\Multi;
use App\Aysen;
use App\Austral;
use Carbon\Carbon;

use Illuminate\Support\Facades\Mail;
Use App\Mail\EnvioPdf;
Use App\Mail\EnvioMulti;
Use App\Mail\EnvioAysen;
Use App\Mail\EnvioAustral;
use Barryvdh\DomPDF\Facade as PDF;

class PDFController extends Controller
{
    //Aqua
    public function PDF(){

       // $aqua = Aqua::all();
        $aqua = Aqua::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->get();

        $pdf = \PDF::loadView('aquapdf', compact('aqua'));
        return $pdf->stream('aquapdf.pdf');
    }
    //Aqua correo
    public function CorreoAqua()
    {          
    
           Mail::to('alarmas@orcatecnologia.cl')
           ->cc('gatino.osses@hotmail.com')
           ->bcc('cespinoza@orcatecnologia.cl')
           ->send(new EnvioPdf);
             //cambiar send por queue asi trabajara en segundo plano sin embargo es mejor hacerlo desde la clase EnvioPdf.
            return redirect("/aqua")->with("ok-email", "");
            
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
    //multi correo
    public function CorreoMulti()
    {          
    
           Mail::to('alarmas@orcatecnologia.cl')
           ->cc('gatino.osses@hotmail.com')
           ->bcc('cespinoza@orcatecnologia.cl')
           ->send(new EnvioMulti);
             //cambiar send por queue asi trabajara en segundo plano sin embargo es mejor hacerlo desde la clase EnvioPdf.
            return redirect("/cliente_dos")->with("ok-email", "");
            
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

    //Aysen correo
    public function CorreoAysen()
    {          
    
           Mail::to('alarmas@orcatecnologia.cl')
           ->cc('gatino.osses@hotmail.com')
           ->bcc('cespinoza@orcatecnologia.cl')
           ->send(new EnvioAysen);
             //cambiar send por queue asi trabajara en segundo plano sin embargo es mejor hacerlo desde la clase EnvioPdf.
            return redirect("/cliente_tres")->with("ok-email", "");
            
    }

    //autral
    public function PDFaustral(){

       // $austral = Austral::all();
        $austral = Austral::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->get();

        $pdf = \PDF::loadView('australpdf', compact('austral'));
        return $pdf->stream('australpdf.pdf');
    }

    //Austral correo
    public function CorreoAustral()
    {          
    
           Mail::to('alarmas@orcatecnologia.cl')
           ->cc('gatino.osses@hotmail.com')
           ->bcc('cespinoza@orcatecnologia.cl')
           ->send(new EnvioAustral);
             //cambiar send por queue asi trabajara en segundo plano sin embargo es mejor hacerlo desde la clase EnvioPdf.
            return redirect("/cliente_cuatro")->with("ok-email", "");
            
    }


}
