<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class messagefillia extends Mailable
{
    public $msg;
    public $files;
    public $inscrito;
    public $prices;
    public $subject;
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     */
    public function __construct($message,$inscrito,$prices,$files)
    {
        $this->msg = $message;
        $this->files = $files;
        $this->inscrito = $inscrito;
        $this->prices = $prices;
        $this->subject = 'Inscrição de '.$this->msg['name'].' / '.$this->msg['id_number'];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.fillia.inscricao.newInscrito',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return $this->files;
    }
}
