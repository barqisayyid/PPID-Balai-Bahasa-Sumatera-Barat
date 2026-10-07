<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi PPID</title>
</head>
<body style="margin:0;padding:0;background-color:#f3f4f6;font-family:Arial,sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="padding:32px 16px;">
<tr><td align="center">
<table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,.08);">

    {{-- Header --}}
    <tr>
        <td style="background-color:#1e40af;padding:28px 32px;">
            <p style="margin:0;color:#ffffff;font-size:18px;font-weight:bold;">
                PPID Balai Bahasa Sumatera Barat
            </p>
            <p style="margin:6px 0 0;color:#bfdbfe;font-size:13px;">
                Notifikasi Otomatis — Formulir Baru Masuk
            </p>
        </td>
    </tr>

    {{-- Body --}}
    <tr>
        <td style="padding:32px;">
            @php
    $labels = [
        'permohonan' => 'Permohonan Informasi',
        'pengaduan'  => 'Pengaduan',
        'keberatan'  => 'Keberatan',
    ];
    $label = $labels[$jenis] ?? ucfirst($jenis);

    // Field yang ditampilkan per jenis (nama kolom asli + label tampilan)
    $fields = [
        'permohonan' => [
            'no_registrasi' => 'No. Registrasi',
            'nama'          => 'Nama',
            'email'         => 'Email',
            'no_hp'         => 'No. HP',
            'rincian'       => 'Rincian Informasi',
            'tujuan'        => 'Tujuan Penggunaan',
            'status'        => 'Status',
        ],
        'pengaduan' => [
            'no_registrasi'    => 'No. Registrasi',
            'nama'             => 'Nama',
            'email'            => 'Email',
            'no_hp'            => 'No. HP',
            'subjek_pengaduan' => 'Subjek',
            'uraian_pengaduan' => 'Uraian',
            'status'           => 'Status',
        ],
        'keberatan' => [
            'no_registrasi' => 'No. Registrasi',
            'nama'          => 'Nama',
            'email'         => 'Email',
            'no_hp'         => 'No. HP',
            'alasan_label'  => 'Alasan Keberatan',
            'rincian'       => 'Rincian Keberatan',
            'status'        => 'Status',
        ],
    ];
    $tampil = $fields[$jenis] ?? [];
@endphp

            <h2 style="margin:0 0 8px;color:#111827;font-size:20px;">{{ $label }} Baru</h2>
            <p style="margin:0 0 24px;color:#6b7280;font-size:14px;">
                Diterima pada {{ now()->translatedFormat('d F Y, H:i') }} WIB
            </p>

            {{-- Tabel data --}}
            {{-- Tabel data --}}
<table width="100%" cellpadding="0" cellspacing="0"
       style="font-size:14px;border-collapse:collapse;">
    @foreach ($tampil as $key => $labelKolom)
        @php $val = $formulir->$key ?? null; @endphp
        @if ($val !== null && $val !== '')
            <tr style="border-bottom:1px solid #e5e7eb;">
                <td style="padding:10px 8px 10px 0;color:#6b7280;width:38%;vertical-align:top;">
                    {{ $labelKolom }}
                </td>
                <td style="padding:10px 0;color:#111827;font-weight:600;">
                    @if ($key === 'status')
                        <span style="background:#fef3c7;color:#92400e;padding:2px 8px;border-radius:4px;font-size:12px;">
                            {{ strtoupper($val) }}
                        </span>
                    @else
                        {{ $val }}
                    @endif
                </td>
            </tr>
        @endif
    @endforeach
</table>

            @if ($formulir->dokumen ?? false)
                <p style="margin:20px 0 0;font-size:13px;color:#6b7280;">
                    📎 Formulir ini menyertakan file lampiran.
                </p>
            @endif

            {{-- CTA Button --}}
            <div style="margin-top:32px;text-align:center;">
                <a href="{{ url('/admin') }}"
                   style="display:inline-block;background-color:#1e40af;color:#ffffff;padding:12px 32px;
                          border-radius:6px;text-decoration:none;font-size:14px;font-weight:bold;">
                    Buka Panel Admin
                </a>
            </div>
        </td>
    </tr>

    {{-- Footer --}}
    <tr>
        <td style="background:#f9fafb;padding:16px 32px;border-top:1px solid #e5e7eb;">
            <p style="margin:0;font-size:12px;color:#9ca3af;text-align:center;">
                Email ini dikirim otomatis oleh sistem PPID. Jangan balas email ini.
            </p>
        </td>
    </tr>

</table>
</td></tr>
</table>
</body>
</html>