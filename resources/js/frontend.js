
document.addEventListener('DOMContentLoaded', function() {
    // Determine active section from URL
    const path = window.location.pathname.replace(/^\//, '') || 'beranda';
    
    // Remove active class from all nav links
    document.querySelectorAll('.nav-link').forEach(link => {
        link.classList.remove('text-blue-700', 'bg-blue-50');
        link.classList.add('text-[#0F2A4A]');
    });

    // Add active class to current section link
    let activeLink = document.querySelector(`a[href="/${path === 'beranda' ? '' : path}"]`) || 
                     document.querySelector(`a[href="${window.location.pathname}"]`);
                     
    if (activeLink && activeLink.classList.contains('nav-link')) {
        activeLink.classList.remove('text-[#0F2A4A]');
        activeLink.classList.add('text-blue-700', 'bg-blue-50');
    }
});

// Image slider functionality
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.slider-dot');
    const sliderTrack = document.getElementById('slider-track');

    function showSlide(index) {
        currentSlide = index;
        if (sliderTrack) { sliderTrack.style.transform = `translateX(-${index * 100}%)`; }

        dots.forEach((dot, i) => {
            dot.classList.toggle('bg-blue-600', i === index);
            dot.classList.toggle('bg-gray-300', i !== index);
        });
    }

    // Dot navigation
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => showSlide(index));
    });

    // Auto-slide
    if (slides.length > 0) { setInterval(() => { currentSlide = (currentSlide + 1) % slides.length; showSlide(currentSlide); }, 5000); }

    // Toggle info detail function for interactive cards
    function toggleInfoDetail(detailId) {
        const detail = document.getElementById(detailId);
        if (detail) {
            detail.classList.toggle('hidden');
        }
    }

    function toggleDetails(detailsId) {
        const details = document.getElementById(detailsId);
        if (details.classList.contains('hidden')) {
            details.classList.remove('hidden');
            details.style.animation = 'fadeIn 0.5s ease-in';
        } else {
            details.classList.add('hidden');
        }
    }


    // ===== Pengiriman formulir layanan (permohonan, pengaduan, keberatan) =====
    function tampilkanPesan(pesanId, sukses, isi, nomor) {
        const el = document.getElementById(pesanId);
        if (!el) return;

        el.className = 'mt-6 p-4 rounded-md border ' + (sukses ?
            'bg-green-100 border-green-400 text-green-700' :
            'bg-red-100 border-red-400 text-red-700');
        el.textContent = '';

        (Array.isArray(isi) ? isi : [isi]).forEach(function(baris, i) {
            const p = document.createElement('p');
            if (i > 0) p.className = 'mt-1';
            p.textContent = baris;
            el.appendChild(p);
        });

        if (nomor) {
            const p = document.createElement('p');
            p.className = 'mt-3';
            p.appendChild(document.createTextNode('Nomor registrasi Anda: '));
            const kuat = document.createElement('strong');
            kuat.textContent = nomor;
            p.appendChild(kuat);
            p.appendChild(document.createTextNode(' (simpan nomor ini untuk menanyakan perkembangan).'));
            el.appendChild(p);
        }

        el.classList.remove('hidden');
        el.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    function kirimFormulir(formId, pesanId, sesudahBerhasil) {
        const form = document.getElementById(formId);
        if (!form) return;

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            if (form.dataset.mengirim) return; // cegah klik ganda

            const tombol = form.querySelector('button[type="submit"]');
            const isiTombol = tombol ? tombol.innerHTML : '';
            form.dataset.mengirim = '1';
            if (tombol) {
                tombol.disabled = true;
                tombol.textContent = 'Mengirim...';
            }

            fetch(form.action, {
                    method: 'POST',
                    body: new FormData(form),
                    headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(function(res) {
                    return res.json().catch(function() { return {}; }).then(function(data) {
                        return { status: res.status, data: data };
                    });
                })
                .then(function(r) {
                    if (r.status === 200 || r.status === 201) {
                        tampilkanPesan(pesanId, true, r.data.message, r.data.nomor);
                        form.reset();
                        if (sesudahBerhasil) sesudahBerhasil();
                    } else if (r.status === 422) {
                        const galat = Object.values(r.data.errors || {}).map(function(a) { return a[0]; });
                        tampilkanPesan(pesanId, false, ['Mohon periksa kembali isian Anda:'].concat(galat));
                    } else if (r.status === 419) {
                        tampilkanPesan(pesanId, false, 'Halaman sudah kedaluwarsa. Silakan muat ulang halaman (tekan F5), lalu kirim kembali.');
                    } else if (r.status === 429) {
                        tampilkanPesan(pesanId, false, 'Terlalu banyak pengiriman dari jaringan Anda. Silakan coba lagi dalam beberapa menit.');
                    } else if (r.status === 413) {
                        tampilkanPesan(pesanId, false, 'Ukuran berkas terlalu besar. Maksimal 5MB.');
                    } else {
                        tampilkanPesan(pesanId, false, 'Maaf, terjadi kesalahan pada server. Silakan coba lagi nanti.');
                    }
                })
                .catch(function() {
                    tampilkanPesan(pesanId, false, 'Tidak dapat terhubung ke server. Periksa koneksi internet Anda, lalu coba lagi.');
                })
                .finally(function() {
                    delete form.dataset.mengirim;
                    if (tombol) {
                        tombol.disabled = false;
                        tombol.innerHTML = isiTombol;
                    }
                });
        });
    }

    kirimFormulir('permohonan-form', 'permohonan-message', function() {
        const preview = document.getElementById('surat-permohonan-preview');
        if (preview) preview.classList.add('hidden');
    });
    kirimFormulir('pengaduan-form', 'pengaduan-message');
    kirimFormulir('keberatan-form', 'keberatan-message', function() {
        const preview = document.getElementById('surat-keberatan-preview');
        if (preview) preview.classList.add('hidden');
    });

    // File upload handling
    function handleFileUpload(inputId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(inputId + '-preview');
        const nameSpan = document.getElementById(inputId + '-name');
        const pesanId = inputId === 'surat-keberatan' ? 'keberatan-message' : 'permohonan-message';

        if (!input) return;

        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Check file size (5MB limit)
                if (file.size > 5 * 1024 * 1024) {
                    tampilkanPesan(pesanId, false, 'Ukuran file terlalu besar. Maksimal 5MB.');
                    input.value = '';
                    if (preview) preview.classList.add('hidden');
                    return;
                }

                if (nameSpan) nameSpan.textContent = file.name;
                if (preview) preview.classList.remove('hidden');
            }
        });
    }

    // Initialize file upload handlers
    if (document.getElementById('surat-permohonan')) {
        handleFileUpload('surat-permohonan');
    }

    // Remove file function
    function removeFile(inputId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(inputId + '-preview');

        if (input) input.value = '';
        if (preview) preview.classList.add('hidden');
    }

    // Reset form function
    function resetForm() {
        const form = document.getElementById('permohonan-form');
        const preview = document.getElementById('surat-permohonan-preview');
        const message = document.getElementById('permohonan-message');

        if (form) form.reset();
        if (preview) preview.classList.add('hidden');
        if (message) message.classList.add('hidden');
    }
