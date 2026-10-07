<!DOCTYPE html>
<html lang="id" data-bs-theme="{{ auth()->user()->theme ?? 'light' }}" dir="ltr" data-layout="vertical" data-card="border">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') | Admin PPID Balai Bahasa Sumbar</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/tutwuri.png') }}" />

        <link rel="stylesheet" href="{{ asset('template/css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/libs/sweetalert2/dist/sweetalert2.min.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,500;0,9..144,600;0,9..144,700;1,9..144,500&family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bs-primary: #0F2A4A;
            --bs-primary-rgb: 15, 42, 74;
            --brand-gold: #C89B3C;
            --brand-paper: #F7F4ED;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .card-title, h1, h2, h3, h4, h5,
        .sidebar-link .hide-menu {
            font-family: 'Fraunces', serif;
        }

        /* Garis aksen emas di item sidebar yang aktif */
        .sidebar-item .sidebar-link.active {
            border-left: 3px solid var(--brand-gold);
        }
    </style>
    <style>
        .colored-toast {
            backdrop-filter: blur(5px);
            background: var(--bs-body-bg, rgba(255, 255, 255, 0.95));
            color: var(--bs-body-color, #333);
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.15);
            border-left: 4px solid var(--toast-color);
            border-radius: 12px;
            padding: 16px;
        }
        .colored-toast.swal2-icon-success { --toast-color: #4caf50; }
        .colored-toast.swal2-icon-error   { --toast-color: #f44336; }
        .colored-toast.swal2-icon-warning { --toast-color: #ff9800; }
        .colored-toast.swal2-icon-info    { --toast-color: #2196f3; }
        .colored-toast .swal2-title { font-size: 16px; font-weight: 500; }
        [data-bs-theme="dark"] .colored-toast { background: rgba(50, 50, 50, 0.95); color: #e0e0e0; }
    </style>
    @stack('styles')
</head>

<body>
    <div class="preloader">
        <img src="{{ asset('template/images/logos/loader.svg') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>

    <div id="main-wrapper">
        @include('admin.layouts.sidebar-vertikal')

        <div class="page-wrapper">
            <div class="body-wrapper">
                <div class="container-fluid">
                    @include('admin.layouts.topbar')

                    @yield('content')
                </div>
            </div>
        </div>
        <div class="dark-transparent sidebartoggler"></div>
    </div>

    {{-- Skrip inti template (dimuat satu kali) --}}
    <script src="{{ asset('template/js/vendor.min.js') }}"></script>
    <script src="{{ asset('template/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('template/js/theme/app.init.js') }}"></script>
    <script src="{{ asset('template/js/theme/theme.js') }}"></script>
    <script src="{{ asset('template/js/theme/app.min.js') }}"></script>
    <script src="{{ asset('template/js/theme/sidebarmenu.js') }}"></script>
    <script src="{{ asset('template/js/theme/feather.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="{{ asset('template/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        // Notifikasi toast
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3500,
            timerProgressBar: true,
            customClass: { popup: 'colored-toast' }
        });

        function showStyledAlert(type, message) {
            Toast.fire({ icon: type, title: message });
        }

        // Proteksi Double Submit & Konfirmasi Hapus
        document.addEventListener('submit', function (e) {
            const form = e.target;
            const submitBtn = form.querySelector('button[type="submit"]');
            
            // Logika Konfirmasi Hapus
            if (form.dataset.confirm && !form.dataset.confirmed) {
                e.preventDefault();
                Swal.fire({
                    title: 'Yakin?',
                    text: form.dataset.confirm,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, lanjutkan',
                    cancelButtonText: 'Batal'
                }).then(function (r) {
                    if (r.isConfirmed) {
                        form.dataset.confirmed = '1';
                        // Disable tombol dan ganti teks sebelum submit
                        if (submitBtn) {
                            submitBtn.disabled = true;
                            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Memproses...';
                        }
                        form.submit();
                    }
                });
                return;
            }

            // Logika Normal Form Submit (mencegah klik berkali-kali)
            if (submitBtn) {
                // Jika form memiliki validasi bawaan HTML5 dan tidak valid, jangan disable tombol
                if (!form.checkValidity || form.checkValidity()) {
                    submitBtn.disabled = true;
                    // Simpan teks asli jika dibutuhkan, tapi kita langsung ganti teksnya
                    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Memproses...';
                }
            }
        });
        });

        

        // Pesan dari server (di-encode JSON agar aman dari karakter khusus)
        @if (session('success'))
            showStyledAlert('success', @json(session('success')));
        @endif
        @if (session('error'))
            showStyledAlert('error', @json(session('error')));
        @endif
        @if ($errors->any())
            showStyledAlert('error', @json($errors->first()));
        @endif
    </script>

    @stack('scripts')
</body>

</html>


