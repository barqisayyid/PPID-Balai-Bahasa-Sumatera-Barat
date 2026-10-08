<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifikasiPengunjung extends Mailable
{
    use Queueable, SerializesModels;

    public $item;
    public $jenis;
    public $isUpdate;

    /**
     * Create a new message instance.
     *
     * @param mixed $item
     * @param string $jenis (permohonan/pengaduan/keberatan)
     * @param bool $isUpdate (false = Resi Baru, true = Update Status)
     */
    public function __construct($item, string $jenis, bool $isUpdate = false)
    {
        $this->item = $item;
        $this->jenis = ucfirst($jenis);
        $this->isUpdate = $isUpdate;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = $this->isUpdate 
            ? "Pembaruan Status {$this->jenis} PPID - {$this->item->no_registrasi}" 
            : "Tanda Terima {$this->jenis} PPID - {$this->item->no_registrasi}";

        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.notifikasi-pengunjung',
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
