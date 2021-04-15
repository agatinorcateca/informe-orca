<?php

namespace App\Exports;

use DB;
use App\Multi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Contracts\Queue\ShouldQueue;

class MultisExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents

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

    public function collection()
    {
       // return Multi::all();
       $multi = DB::table('tdmulti')->select('id','titulo','observacion','estado','grabacion','created_at','updated_at')
        ->where('created_at','>=',$this->from)->where('created_at','<=', $this->to)->get();
        return $multi;
    }

     /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }

    //function header in excel
    public function headings(): array
    {
        return [
            'N°',
            'centro',
            'observacion',
            'estado',
            'grabacion',
            'fecha inicial',
            'updated_at',
       ];
   }
}
