<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PPID - Balai Bahasa Provinsi Sumatera Barat</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

    <!-- jQuery (wajib, DataTables butuh ini) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- JS DataTables -->
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;0,9..144,600;0,9..144,700;1,9..144,500&family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #F7F4ED;
        }

        h1, h2, h3, h4, .font-heading {
            font-family: 'Fraunces', serif;
        }

        /* Label kecil di atas judul section — dipakai hanya kalau isinya memang berguna, bukan dekorasi */
        .eyebrow {
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.03em;
            color: #C89B3C;
        }

        /* Tombol utama identitas baru */
        .btn-brand {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background-color: #0F2A4A;
            color: #fff;
            padding: 0.65rem 1.5rem;
            border-radius: 0.375rem;
            font-weight: 600;
            transition: background-color 0.2s ease;
        }
        .btn-brand:hover {
            background-color: #16477c;
        }

        .btn-brand-outline {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: 1.5px solid #0F2A4A;
            color: #0F2A4A;
            padding: 0.6rem 1.4rem;
            border-radius: 0.375rem;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        .btn-brand-outline:hover {
            background-color: #0F2A4A;
            color: #fff;
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
        }

        .fade-in {
            animation: fadeIn 0.8s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .slider-container {
            position: relative;
            overflow: hidden;
        }

        .slider-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            min-width: 100%;
            height: 500px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            font-weight: bold;
        }

        .slide:nth-child(2) {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .slide:nth-child(3) {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        

        
    </style>
</head>

<body class="overflow-x-hidden">

    <!-- Aksen garis emas-biru, ciri khas identitas kementerian -->
    <div class="h-1.5 w-full bg-gradient-to-r from-yellow-400 via-blue-700 to-yellow-400"></div>

    @include('main.header')

    <main class="container mx-auto px-4 xl:px-8 py-8 min-h-screen">
        @yield('content')
    </main>

    @include('main.footer')


    
    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/+6285186055030" target="_blank" aria-label="Chat WhatsApp"
       class="fixed bottom-6 right-6 z-50 flex items-center gap-3 bg-[#00e676] text-white px-4 py-3 md:px-5 md:py-3.5 rounded-full shadow-2xl hover:bg-[#00c853] hover:scale-105 hover:-translate-y-1 transition-all duration-300 group">
        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.097" />
        </svg>
        <div class="text-left hidden md:block">
            <p class="text-[9px] uppercase font-bold leading-none mb-1 opacity-90">Layanan & Aduan</p>
            <p class="text-sm font-extrabold leading-none tracking-wide">0851-8605-5030</p>
        </div>
    </a>

    <!-- Initialize DataTables -->
    <script>
        $(document).ready(function() {
            $('table[id^="tabel-"]').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.13.8/i18n/id.json"
                },
                "pageLength": 10,
                "responsive": true
            });
        });
    </script>
    <!-- Global JS -->
    <script>
        // Proteksi Double Submit Global
        document.addEventListener('submit', function (e) {
            const form = e.target;
            const submitBtn = form.querySelector('button[type="submit"]');
            
            if (submitBtn) {
                // Jangan disable jika form tidak valid (HTML5 validation)
                if (!form.checkValidity || form.checkValidity()) {
                    submitBtn.disabled = true;
                    // Animasi sederhana
                    submitBtn.style.opacity = '0.7';
                    submitBtn.style.cursor = 'not-allowed';
                    submitBtn.innerHTML = '<svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Memproses...';
                }
            }
        });
    </script>
</body>


