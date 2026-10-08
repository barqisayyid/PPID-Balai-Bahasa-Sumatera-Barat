<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $isUpdate ? 'Pembaruan Status Pengajuan' : 'Tanda Terima Pengajuan' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333333;
            background-color: #f9fafb;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
        }
        .header {
            background-color: #0F2A4A;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 20px;
        }
        .content {
            padding: 30px 20px;
        }
        .info-box {
            background-color: #f3f4f6;
            border-left: 4px solid #3b82f6;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .tanggapan-box {
            background-color: #eff6ff;
            border: 1px solid #bfdbfe;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .btn {
            display: inline-block;
            background-color: #2563eb;
            color: #ffffff !important;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 6px;
            font-weight: bold;
            margin-top: 15px;
        }
        .footer {
            background-color: #f9fafb;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 8px 0;
            vertical-align: top;
        }
        td:first-child {
            width: 40%;
            font-weight: bold;
            color: #4b5563;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>PPID Balai Bahasa Provinsi Sumatera Barat</h1>
        </div>
        
        <div class="content">
            <p>Halo, <strong>{{ $item->nama }}</strong>,</p>
            
            @if($isUpdate)
                <p>Ini adalah pemberitahuan bahwa status <strong>{{ $jenis }}</strong> Anda telah diperbarui.</p>
            @else
                <p>Terima kasih telah menghubungi PPID Balai Bahasa Provinsi Sumatera Barat. <strong>{{ $jenis }}</strong> Anda telah kami terima dan akan segera diproses.</p>
            @endif

            <div class="info-box">
                <table>
                    <tr>
                        <td>Nomor Registrasi</td>
                        <td>: <strong>{{ $item->no_registrasi }}</strong></td>
                    </tr>
                    <tr>
                        <td>Jenis Layanan</td>
                        <td>: {{ $jenis }}</td>
                    </tr>
                    <tr>
                        <td>Status Saat Ini</td>
                        <td>: <strong>{{ ucfirst($item->status) }}</strong></td>
                    </tr>
                    <tr>
                        <td>Tanggal Pengajuan</td>
                        <td>: {{ $item->created_at->format('d F Y, H:i') }}</td>
                    </tr>
                </table>
            </div>

            @if($isUpdate && $item->tanggapan)
            <div class="tanggapan-box">
                <h4 style="margin-top: 0; color: #1e40af; margin-bottom: 10px;">Tanggapan / Keterangan Admin:</h4>
                <p style="margin: 0; white-space: pre-line;">{{ $item->tanggapan }}</p>
            </div>
            @endif

            <p style="margin-top: 30px;">Anda dapat melacak atau mengecek status pengajuan ini secara berkala melalui tautan berikut:</p>
            
            <div style="text-align: center;">
                <a href="{{ route('cek-status') }}?nomor={{ $item->no_registrasi }}&email={{ urlencode($item->email) }}" class="btn">
                    Cek Status Pengajuan
                </a>
            </div>
        </div>
        
        <div class="footer">
            <p>Email ini dihasilkan secara otomatis, mohon untuk tidak membalas email ini.</p>
            <p>&copy; {{ date('Y') }} Balai Bahasa Provinsi Sumatera Barat. Semua hak dilindungi.</p>
        </div>
    </div>
</body>
</html>
