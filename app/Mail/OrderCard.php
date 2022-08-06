<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCard extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($data)
    {
        $this->subject = $data['subject'];
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject($this->subject)->view('mails.email', $this->data);

    }
}