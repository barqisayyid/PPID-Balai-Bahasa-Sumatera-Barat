<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/tutwuri.png') }}" />

    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('template/css/styles.css') }}" />
    
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <title>Login | PPID Balai Bahasa Sumbar</title>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader" style="display: none;">
      <div class="lds-ripple"></div>
    </div>
    <div id="main-wrapper" class="p-0 bg-white">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="auth-login-shape position-relative">
                <div class="auth-login-wrapper card mb-0 container position-relative">
                    <div class="card-body">

                        <div class="row align-items-center justify-content-around">
                            
                            <div class="col-lg-6 col-xl-10 mb-5">
                                <h2 class="mb-6 fs-8 fw-bolder text-center">PPID BALAI BAHASA PROVINSI SUMATERA BARAT</h2>
                                <div class="d-flex align-items-center gap-100">

                                </div>
                                <div class="position-relative text-center my-1">
                                    <div class="px-3 d-inline-block bg-white z-1 position-relative">
                                        <img src="{{ asset('images/tutwuri.png') }}"
                                             alt="Logo"
                                             style="max-height: 50px; width: auto;">
                                    </div>
                                
                                    <span
                                        class="border-top w-100 position-absolute top-50 start-50 translate-middle">
                                    </span>
                                </div>
                                <form novalidate method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-4 form-group">
                                        <label class="form-label">Email <span class="text-danger">*</span></label>
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control" required data-validation-required-message="Email tidak boleh kosong!!" value="{{ old('email') }}" />
                                        </div>
                                    </div>
                                    <div class="mb-4 form-group">
                                        <label class="form-label">Password
                                            <span class="text-danger">*</span></label>
                                        <div class="controls">
                                            <input type="password" name="password" class="form-control" required data-validation-required-message="Password tidak boleh kosong!!" />
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-7 pb-1">
                                        <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox" value="1"
                                                id="flexCheckChecked" name="remember" />
                                            <label class="form-check-label text-dark fs-3" for="flexCheckChecked">
                                                Ingat perangkat ini
                                            </label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100 mb-7 rounded-pill" type="submit">Masuk</button>
                                    <div class="d-flex align-items-center">
                                        <a class="text-primary fw-bold fs-3" href="{{ route('main') }}">&larr; Kembali ke situs PPID</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Import Js Files -->
    <script src="{{ asset('template/js/vendor.min.js') }}"></script>
    <script src="{{ asset('template/libs/simplebar/dist/simplebar.min.js') }}"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="{{ asset('template/js/extra-libs/jqbootstrapvalidation/validation.js') }}"></script>
    <script src="{{ asset('template/js/forms/custom-validation-init.js') }}"></script>
    
    <script>
      // Function to show styled alerts
      function showStyledAlert(type, message) {
          const Toast = Swal.mixin({
              toast: true,
              position: 'top',
              showConfirmButton: false,
              timer: 5000,
              timerProgressBar: true,
              didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
              },
              customClass: {
                  popup: 'colored-toast',
                  title: 'toast-title',
                  icon: 'toast-icon'
              }
          });
          
          Toast.fire({
              icon: type,
              title: message
          });
      }
      
      // Display styling in header
      document.head.insertAdjacentHTML('beforeend', `
          <style>
              .colored-toast {
                  backdrop-filter: blur(5px);
                  background: var(--bs-body-bg, rgba(255, 255, 255, 0.95));
                  color: var(--bs-body-color, #333);
                  box-shadow: 0 8px 32px rgba(31, 38, 135, 0.15);
                  border-left: 4px solid var(--toast-color);
                  border-radius: 12px;
                  padding: 16px;
                  transform: translateY(15px);
                  animation: toast-in 0.3s ease forwards;
              }
              
              @keyframes toast-in {
                  0% {
                      transform: translateY(-20px);
                      opacity: 0;
                  }
                  100% {
                      transform: translateY(0);
                      opacity: 1;
                  }
              }
              
              /* Warna border berdasarkan tipe toast */
              .colored-toast.swal2-icon-success {
                  --toast-color: #4caf50;
              }
              
              .colored-toast.swal2-icon-error {
                  --toast-color: #f44336;
              }
              
              .colored-toast.swal2-icon-warning {
                  --toast-color: #ff9800;
              }
              
              .colored-toast.swal2-icon-info {
                  --toast-color: #2196f3;
              }
              
              /* Penyesuaian teks dan ikon */
              .colored-toast .swal2-title {
                  font-size: 16px;
                  font-weight: 500;
              }
              
              .colored-toast .swal2-icon {
                  margin: 0 12px 0 0;
                  height: 24px;
                  width: 24px;
                  min-width: 24px;
              }
              
              .colored-toast .swal2-close {
                  color: var(--bs-gray-600, #666);
              }
              
              /* Penyesuaian untuk tema gelap */
              [data-bs-theme="dark"] .colored-toast {
                  background: rgba(50, 50, 50, 0.95);
                  color: #e0e0e0;
              }
          </style>
      `);
    
      // Display SweetAlert for authentication errors
      @if($errors->any())
          showStyledAlert('error', @json($errors->first()));
      @endif
      
      // Display success message
      @if(session('success'))
          showStyledAlert('success', @json(session('success')));
      @endif
      
      // Display error message
      @if(session('error'))
          showStyledAlert('error', @json(session('error')));
      @endif
    </script>
</body>

</html>
