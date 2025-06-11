<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\HtmlString;

class TicketConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $registration;
    public $qrCode;
    public $event;
    public $ticket;
    public $user; // ✅ أضفنا user هنا

    public function __construct($registration, HtmlString $qrCode, $event, $ticket, $user)
    {
        $this->registration = $registration;
        $this->qrCode = $qrCode;
        $this->event = $event;
        $this->ticket = $ticket;
        $this->user = $user; 
    }

    public function build()
    {
       return $this->view('emails.ticket_confirmation')
            ->subject('🎫 Ticket Confirmation')
            ->with([
                'registration' => $this->registration,
                'qrCode' => $this->qrCode, 
                'event' => $this->event,
                'ticket' => $this->ticket,
                'user' => $this->user,
            ]);

    }
}
