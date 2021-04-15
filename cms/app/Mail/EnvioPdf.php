<?php

namespace App\Mail;

use Mail;
use App\Aqua;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
// implementar ShouldQueue para asi generar segundo plano sin necesidad de escribir queue
class EnvioPdf extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $aqua = Aqua::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->get();

        $pdf = \PDF::loadView('aquapdf', compact('aqua'));

       return $this->subject('Estado de centros orca 2021')
            ->attachData($pdf->output(), 'aqua.pdf')
            ->view('testemail');

    }
}
