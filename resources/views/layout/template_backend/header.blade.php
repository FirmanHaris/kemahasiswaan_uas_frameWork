<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">

                <a href="index-2.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets_backend') }}/images/logo_kampus.png" alt="" height="25">
                    </span>
                    <span class="logo-lg" style="color: #010101">
                        <img src="{{ asset('assets_backend') }}/images/logokemas.png" height="25" alt="">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu" style="color: #010101"></i>
            </button>
        </div>
        <div class="d-flex">
            <!-- User -->
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect user-step" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="{{ asset('assets_backend') }}/images/users/user-1.jpg" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1"
                        style="color: #010101;">{{ auth()->user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block" style="color: #010101"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i
                            class="dripicons-user d-inline-block text-muted me-2"></i>
                        Profile</a>
                    <a class="dropdown-item" href="#"><i
                            class="dripicons-wallet d-inline-block text-muted me-2"></i> My
                        Wallet</a>
                    <a class="dropdown-item d-block" href="#"><i
                            class="dripicons-gear d-inline-block text-muted me-2"></i> Settings</a>
                    <a class="dropdown-item" href="#"><i
                            class="dripicons-lock d-inline-block text-muted me-2"></i> Lock
                        screen</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"><i
                            class="dripicons-exit d-inline-block text-muted me-2"></i>
                        Logout</a>
                </div>
            </div>

        </div>
    </div>
</header>
