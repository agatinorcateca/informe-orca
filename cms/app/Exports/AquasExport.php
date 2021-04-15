<?php

namespace App\Exports;

use App\Aqua;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Contracts\Queue\ShouldQueue;

class AquasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'N°',
            'Nombre Centro',
            'observacion',
            'estado',
            'grabacion',
            'fecha inicial',
            'updated_at',
        ];
    }
    public function collection()
    {
        $aquas = DB::table('tdaqua')->select('id','titulo','observacion','estado','grabacion','created_at','updated_at')->get(); 
        return $aquas;
    }
}
