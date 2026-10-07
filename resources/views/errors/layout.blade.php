<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('kode') - @yield('judul') | PPID Balai Bahasa Sumatera Barat</title>
    <style>
        body { margin: 0; min-height: 100vh; display: flex; align-items: center; justify-content: center;
               font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif; background: #f3f4f6; color: #1f2937; }
        .kotak { max-width: 460px; margin: 24px; padding: 40px 32px; background: #fff; border-radius: 12px;
                 box-shadow: 0 4px 24px rgba(0, 0, 0, .08); text-align: center; }
        .kode { font-size: 64px; font-weight: 700; color: #2563eb; line-height: 1; margin: 0 0 8px; }
        h1 { font-size: 22px; margin: 0 0 12px; }
        p { color: #4b5563; line-height: 1.6; margin: 0 0 24px; }
        a { display: inline-block; background: #2563eb; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 8px; }
        a:hover { background: #1d4ed8; }
    </style>
</head>
<body>
    <div class="kotak">
        <p class="kode">@yield('kode')</p>
        <h1>@yield('judul')</h1>
        <p>@yield('pesan')</p>
        <a href="{{ url('/') }}">Kembali ke Beranda</a>
    </div>
</body>
</html>