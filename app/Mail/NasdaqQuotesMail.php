<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NasdaqQuotesMail extends Mailable
{
    use Queueable, SerializesModels;

    public $symbol, $email, $fromDate, $toDate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->symbol 	= $data['symbol'];
        $this->email 	= $data['email'];
        $this->fromDate = $data['fromDate'];
        $this->toDate 	= $data['toDate'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail');
    }
}
