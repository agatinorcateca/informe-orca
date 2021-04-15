<?php

namespace App\Http\Controllers;
use DB;
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

        $viewer = Prueba::select(\DB::raw('strftime("%m", created_at) as month, count(id) as total'))
                    ->whereBetween('created_at', ['2020-01-01 00:00:00', '2020-12-31 23:59:59'])
                    ->groupBy('month')
                    ->orderBy('month')
                    ->pluck('total', 'month')
                    ->all();

        $click = Totalcentros::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');
                    
        return view('highchart',compact('viewer','click'));
       

    }
}