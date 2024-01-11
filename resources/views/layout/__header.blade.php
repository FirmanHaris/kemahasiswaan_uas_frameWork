        <header id="header" class="fixed-top">
            <div class="container d-flex align-items-center justify-content-between">
                <!-- <div class="col-12"> -->
                <a href="" class="logo me-auto"><img src="{{ asset('assets/img/logokemas.png') }}" alt="" class="w-100"></a>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html" class="logo me-auto"><img src="{{ asset('assets') }}/img/logo.png" alt="" class="img-fluid"></a>-->

                <nav id="navbar" class="navbar order-last order-lg-0">
                    <ul>
                        <li><a class="{{ request()->routeIs('beranda') ? 'active' : '' }}" href="{{ route('beranda') }}">Beranda</a>
                        </li>
                        <li><a class="{{ request()->is('berita') ? 'active' : '' }}" href="{{ route('berita') }}">Berita</a>
                        </li>
                        <li><a class="{{ request()->is('prestasi') ? 'active' : '' }}" href="{{ route('prestasi') }}">Prestasi</a></li>
                        <li><a class="{{ request()->is('beasiswa') ? 'active' : '' }}" href="{{ route('beasiswa') }}">Beasiswa</a></li>
                        <li><a class="{{ request()->is('ormawa') ? 'active' : '' }}" href="{{ route('ormawa_f') }}">Ormawa</a>
                        </li>
                        <li><a class="{{ request()->is('lemawa') ? 'active' : '' }}" href="{{ route('lemawa_f') }}">Lemawa</a>
                        </li>
                        <li><a class="{{ request()->is('dokumen') ? 'active' : '' }}" href="{{ route('dokumen') }}">Dokumen</a>
                        </li>
                        <li class="dropdown"><a href="#"><span>Karya Mahasiswa</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="{{route('ti')}}">Teknik Informatika</a></li>
                                <li><a href="{{route('si')}}">Sistem Informasi</a></li>
                            </ul>
                        </li>
                        <li class="text-center">
                            <button class="get-started-btn border-0">
                                <a href="{{ route('login') }}" class=" p-0 m-0">Login</a>
                            </button>
                        </li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

                <!-- </div> -->
            </div>
        </header>