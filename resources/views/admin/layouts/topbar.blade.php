<header class="topbar sticky-top">
    <div class="with-vertical">
        <nav class="navbar navbar-expand-lg p-0">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                        <div class="nav-icon-hover-bg rounded-circle">
                            <iconify-icon icon="solar:list-bold-duotone" class="fs-7 text-dark"></iconify-icon>
                        </div>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav quick-links d-none d-lg-flex">
                <li class="nav-item">
                    <span class="nav-link fw-semibold">Panel Admin PPID Balai Bahasa Provinsi Sumatera Barat</span>
                </li>
            </ul>

            <a class="navbar-toggler nav-icon-hover p-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="p-2"><i class="ti ti-dots fs-7"></i></span>
            </a>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                    {{-- Ganti tema --}}
                    <li class="nav-item">
                        <a class="nav-link nav-icon-hover moon dark-layout" href="javascript:void(0)"
                            style="display: {{ auth()->user()->theme === 'dark' ? 'none' : 'flex' }}">
                            <iconify-icon icon="solar:moon-line-duotone" class="moon fs-7"></iconify-icon>
                        </a>
                        <a class="nav-link nav-icon-hover sun light-layout" href="javascript:void(0)"
                            style="display: {{ auth()->user()->theme === 'dark' ? 'flex' : 'none' }}">
                            <iconify-icon icon="solar:sun-2-line-duotone" class="sun fs-7"></iconify-icon>
                        </a>
                    </li>

                    {{-- Menu akun --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link position-relative ms-6" href="javascript:void(0)" id="drop1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="d-flex align-items-center flex-shrink-0">
                                <div class="user-profile me-sm-3 me-2">
                                    <img src="{{ asset('template/images/profile/user-1.jpg') }}" width="45"
                                        class="rounded-circle" alt="">
                                </div>
                                <div class="d-none d-sm-block">
                                    <h6 class="fw-bold fs-4 mb-1 profile-name">{{ Auth::user()->name }}</h6>
                                    <p class="fs-3 lh-base mb-0 profile-subtext text-capitalize">{{ Auth::user()->role }}</p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                            aria-labelledby="drop1">
                            <div class="profile-dropdown position-relative" data-simplebar>
                                <div class="d-flex align-items-center mx-7 py-9 border-bottom">
                                    <img src="{{ asset('template/images/profile/user-1.jpg') }}" alt="user" width="70"
                                        class="rounded-circle" />
                                    <div class="ms-4">
                                        <h4 class="mb-0 fs-5 fw-normal">{{ Auth::user()->name }}</h4>
                                        <span class="text-muted text-capitalize">{{ Auth::user()->role }}</span>
                                        <p class="text-muted mb-0 mt-1 d-flex align-items-center">
                                            <iconify-icon icon="solar:mailbox-line-duotone" class="fs-4 me-1"></iconify-icon>
                                            {{ Auth::user()->email }}
                                        </p>
                                    </div>
                                </div>

                                <div class="message-body">
                                    <a href="{{ route('profile.edit') }}"
                                        class="dropdown-item px-7 d-flex align-items-center py-6">
                                        <span class="btn px-3 py-2 bg-info-subtle rounded-1 text-info shadow-none">
                                            <iconify-icon icon="solar:user-circle-bold-duotone" class="fs-7"></iconify-icon>
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                            <h5 class="mb-0 mt-1 fs-4 fw-normal">Profil Saya</h5>
                                            <span class="fs-3 text-nowrap d-block fw-normal mt-1 text-muted">Nama, email, dan password</span>
                                        </div>
                                    </a>
                                </div>

                                <div class="py-6 px-7 mb-1">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary w-100">Keluar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
