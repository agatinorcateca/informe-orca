<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reportes;
use App\Blog;
use App\Administradores;
use App\Prueba;
use App\Totalcentros;

class HighchartController extends Controller
{
    public function highchart()
    {

        $viewer = Prueba::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');

        $click = Totalcentros::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');
                    
        return view('highchart',compact('viewer','click'));
       

    }
}