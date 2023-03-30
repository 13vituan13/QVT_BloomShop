<?php 
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;


class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $dataMail = [];

    public function __construct($dataMail)
    {
        $this->dataMail = $dataMail;
    }

    public function build()
    {
        return $this->view('layouts.mail')
                    ->with([
                        'dataMail' => $this->dataMail,
                    ]);
    }
}
