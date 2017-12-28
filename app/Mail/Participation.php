<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Participation extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    /**
     * Participation Mail constructor.
     *
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;

        return $this->subject('Requisição de Participação - ' . $data['nmprojeto'])
            ->view('emails.participation', compact('data'));
    }
}
