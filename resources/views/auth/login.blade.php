<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login | Admin PPID Balai Bahasa Sumbar</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/tutwuri.png') }}" />
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,500;0,9..144,600;0,9..144,700;1,9..144,500&family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700&display=swap" rel="stylesheet">
    
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        h1, h2, h3, .font-serif { font-family: 'Fraunces', serif; }
        .glass-panel { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); }
    </style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-4">

    <div class="max-w-5xl w-full bg-white rounded-[2rem] shadow-2xl overflow-hidden flex flex-col md:flex-row">
        
        <!-- Left: Branding Panel -->
        <div class="w-full md:w-5/12 bg-gradient-to-br from-[#0F2A4A] to-blue-900 p-10 md:p-12 flex flex-col justify-between relative overflow-hidden text-white min-h-[300px] md:min-h-0">
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 w-full h-full bg-[url('https://images.unsplash.com/photo-1541675154750-0444c7d51e8e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')] bg-cover bg-center opacity-10 mix-blend-overlay"></div>
            <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-amber-500 rounded-full blur-[80px] opacity-40"></div>
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-blue-400 rounded-full blur-[80px] opacity-20"></div>
            
            <div class="relative z-10">
                <div class="w-16 h-16 bg-white rounded-2xl p-2 shadow-lg mb-8 flex items-center justify-center">
                    <img src="{{ asset('images/tutwuri.png') }}" alt="Logo Tut Wuri" class="w-full h-auto object-contain">
                </div>
                
                <h2 class="text-3xl md:text-4xl font-black font-serif leading-tight mb-4 tracking-tight">
                    Portal Admin <br> <span class="text-amber-400">PPID Publik</span>
                </h2>
                <p class="text-blue-100/80 text-sm md:text-base leading-relaxed max-w-sm">
                    Sistem Pengelolaan Informasi dan Dokumentasi (PPID) Balai Bahasa Provinsi Sumatera Barat.
                </p>
            </div>
            
            <div class="relative z-10 mt-12">
                <div class="flex items-center gap-3 opacity-70">
                    <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8V7a4 4 0 00-8 0v4h8z"></path></svg>
                    <span class="text-xs font-bold uppercase tracking-widest">Kawasan Terbatas</span>
                </div>
            </div>
        </div>

        <!-- Right: Login Form -->
        <div class="w-full md:w-7/12 p-10 md:p-16 flex flex-col justify-center bg-white relative">
            <div class="max-w-sm mx-auto w-full">
                
                <div class="mb-10 text-center">
                    <h3 class="text-2xl font-bold text-[#0F2A4A] mb-2">Selamat Datang</h3>
                    <p class="text-gray-500 text-sm">Silakan masuk menggunakan kredensial Anda.</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label for="email" class="text-sm font-bold text-gray-700">Alamat Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                            </div>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                                class="block w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:bg-white focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition-all"
                                placeholder="admin@balaibahasa.go.id">
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-2">
                        <div class="flex items-center justify-between">
                            <label for="password" class="text-sm font-bold text-gray-700">Kata Sandi</label>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <input type="password" name="password" id="password" required
                                class="block w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:bg-white focus:ring-2 focus:ring-amber-400 focus:border-amber-400 transition-all"
                                placeholder="��������">
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-amber-500 focus:ring-amber-400 border-gray-300 rounded cursor-pointer">
                        <label for="remember" class="ml-2 block text-sm text-gray-600 cursor-pointer">
                            Ingat sesi saya
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full flex justify-center items-center gap-2 py-3 px-4 border border-transparent rounded-xl shadow-lg shadow-[#0F2A4A]/20 text-sm font-bold text-white bg-gradient-to-r from-[#0F2A4A] to-blue-900 hover:shadow-xl hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-400 transition-all">
                        Masuk Sistem
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </form>

                <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                    <a href="{{ url('/') }}" class="inline-flex items-center justify-center gap-2 text-sm font-medium text-gray-500 hover:text-[#0F2A4A] transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Kembali ke Halaman Publik
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });

        function showStyledAlert(type, message) {
            Toast.fire({ icon: type, title: message });
        }

        @if($errors->any())
            showStyledAlert('error', @json($errors->first()));
        @endif
        @if(session('success'))
            showStyledAlert('success', @json(session('success')));
        @endif
        @if(session('error'))
            showStyledAlert('error', @json(session('error')));
        @endif
        
        // Prevent Double Submit
        document.addEventListener('submit', function (e) {
            const btn = e.target.querySelector('button[type="submit"]');
            if (btn) {
                btn.disabled = true;
                btn.innerHTML = '<svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Memverifikasi...';
            }
        });
    </script>
</body>
</html>

