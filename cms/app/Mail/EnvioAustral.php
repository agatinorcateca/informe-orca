<?php

namespace App\Mail;
use Mail;
use App\Austral;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvioAustral extends Mailable implements ShouldQueue
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
        $austral = Austral::whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))->get();

        $pdf = \PDF::loadView('australpdf', compact('austral'));

       return $this->subject('Estado de centros orca 2021')
            ->attachData($pdf->output(), 'austral.pdf')
            ->view('testemail');
    }
}
