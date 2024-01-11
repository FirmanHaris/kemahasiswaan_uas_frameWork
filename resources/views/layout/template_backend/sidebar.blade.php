<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{ route('dashboard') }}" class=" waves-effect">
                        <i class="mdi mdi-speedometer"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @if(auth()->user()->role == "admin")
                <li>
                    <a href="{{ route('kategori') }}" class=" waves-effect">
                        <i class="mdi mdi-newspaper-variant-outline"></i>
                        <span>Kategori</span>
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{ route('berita') }}" class=" waves-effect">
                        <i class="mdi mdi-newspaper-variant-outline"></i>
                        <span>Berita</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('prestasi') }}" class=" waves-effect">
                        <i class="mdi mdi-certificate-outline"></i>
                        <span>Prestasi</span>
                    </a>
                </li>
                @if(auth()->user()->role == "admin")
                <li>
                    <a href="{{ route('beasiswa') }}" class=" waves-effect">
                        <i class="mdi mdi-school"></i>
                        <span>Beasiswa</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('ormawa_b') }}" class=" waves-effect">
                        <i class="mdi mdi-account-group-outline"></i>
                        <span>Ormawa</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('lemawa_b')}}" class=" waves-effect">
                        <i class="mdi mdi-account-group-outline"></i>
                        <span>Lemawa</span>
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{ route('pengurus_ormawa') }}" class="waves-effect">
                        <i class="mdi mdi-school"></i>
                        <span>Pengurus ormawa</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pengurus_lemawa') }}" class="waves-effect">
                        <i class="mdi mdi-school"></i>
                        <span>Pengurus Lemawa</span>
                    </a>
                </li>
                @if(auth()->user()->role == "admin")
                <li>
                    <a href="{{ route('dokumen') }}" class=" waves-effect">
                        <i class="mdi mdi-file-document-multiple-outline"></i>
                        <span>Dokumen</span>
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{route('karya')}}" class=" waves-effect">
                        <i class="mdi mdi-gift-open-outline"></i>
                        <span>Karya Mahasiswa</span>
                    </a>
                </li>
                @if(auth()->user()->role == "admin")
                <li>
                    <a href="{{route('user')}}" class=" waves-effect">
                        <i class="mdi mdi-account-tie"></i>
                        <span>Users</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>