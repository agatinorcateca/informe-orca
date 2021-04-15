<?php

namespace App\Exports;
use DB;
use App\Aqua;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Contracts\Queue\ShouldQueue;

class AquasExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents

{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    // varible form and to 
    public function __construct(String $from = null , String $to = null)
    {
        $this->from = $from;
        $this->to   = $to;
    }

    //function select data from database 
    public function collection()
    {
   //*****mostrar todos los registros en la base de datos***.
       //$aquas = DB::table('tdaqua')->select('id','titulo','observacion','estado','grabacion','created_at','updated_at')->get(); 

       //*****mostrar registro por fecha*****.
   $aquas = DB::table('tdaqua')->select('id','titulo','observacion','estado','grabacion','created_at','updated_at')
   ->where('created_at','>=',$this->from)->where('created_at','<=', $this->to)->get();
     
   return $aquas;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
    //funcion header en excel
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
    
}
