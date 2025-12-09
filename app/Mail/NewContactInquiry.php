<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewContactInquiry extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // Add this property

    /**
     * Create a new message instance.
     */
    public function __construct(array $data) // Fix: add array $data parameter
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Liên hệ mới từ khách hàng', // Change to Vietnamese
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact',
            with: ['data' => $this->data], // Pass data to view
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

    // Remove the build() method - not needed with new Laravel Mail API
}
