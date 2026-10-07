<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Database\Eloquent\Model;

class FormulirMasuk extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly string $jenis,
        public readonly Model  $formulir,
    ) {}

    public function envelope(): Envelope
    {
        $labels = [
            'permohonan' => 'Permohonan Informasi',
            'pengaduan'  => 'Pengaduan',
            'keberatan'  => 'Keberatan',
        ];

        $label  = $labels[$this->jenis] ?? ucfirst($this->jenis);
        $nomor  = $this->formulir->no_registrasi ?? '-';

        return new Envelope(
            subject: "[PPID] {$label} Baru — {$nomor}",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.formulir-masuk',
            with: [
                'jenis'    => $this->jenis,
                'formulir' => $this->formulir,
            ],
        );
    }
}