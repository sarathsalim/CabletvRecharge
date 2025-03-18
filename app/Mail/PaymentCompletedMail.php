<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentCompletedMail extends Mailable
{
    use Queueable, SerializesModels;
    public $packagename;
    public $amount;
    public $days;
    /**
     * Create a new message instance.
     */
    public function __construct($packagename, $amount, $days)
    {
        $this->packagename = $packagename;
        $this->amount = $amount;
        $this->days = $days;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Payment Completed Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.payment_completed', // Make sure this view exists in resources/views/emails/payment_completed.blade.php
            with: [
                'packagename' => $this->packagename,
                'amount' => $this->amount,
                'days' => $this->days,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
