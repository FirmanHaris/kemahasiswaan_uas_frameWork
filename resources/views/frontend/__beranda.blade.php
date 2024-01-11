@extends('layout.__app')
@section('content')
    <!-- ======= Hero Section ======= -->

    <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" navigation="true" space-between="30"
        centered-slides="true" autoplay-delay="2500" autoplay-disable-on-interaction="false">
        <swiper-slide><img src="{{ asset('assets/img/poto.png') }}" alt=""></swiper-slide>
        <swiper-slide><img src="{{ asset('assets/img/poto3.jpeg') }}" alt=""></swiper-slide>
    </swiper-container>

    <main id="main">

        <!-- ======= Berita & pengumuman Section ======= -->
        {{-- <section id="popular-courses" class="courses">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <p>Berita & Pengumuman</p>
                </div>
                <div class="row" data-aos="zoom-in" data-aos-delay="100">

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="course-item">
                            <img src="{{ asset('assets') }}/img/course-1.jpg" class="img-fluid" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>Web Development</h4>
                                    <p class="price">$169</p>
                                </div>

                                <h3><a href="course-details.html">Website Design</a></h3>
                                <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae
                                    dolores dolorem tempore.</p>
                                <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        <img src="{{ asset('assets') }}/img/trainers/trainer-1.jpg" class="img-fluid"
                                            alt="">
                                        <span>Antonio</span>
                                    </div>
                                    <div class="trainer-rank d-flex align-items-center">
                                        <i class="bx bx-user"></i>&nbsp;50
                                        &nbsp;&nbsp;
                                        <i class="bx bx-heart"></i>&nbsp;65
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Course Item-->

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                        <div class="course-item">
                            <img src="{{ asset('assets') }}/img/course-2.jpg" class="img-fluid" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>Marketing</h4>
                                    <p class="price">$250</p>
                                </div>

                                <h3><a href="course-details.html">Search Engine Optimization</a></h3>
                                <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae
                                    dolores dolorem tempore.</p>
                                <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        <img src="{{ asset('assets') }}/img/trainers/trainer-2.jpg" class="img-fluid"
                                            alt="">
                                        <span>Lana</span>
                                    </div>
                                    <div class="trainer-rank d-flex align-items-center">
                                        <i class="bx bx-user"></i>&nbsp;35
                                        &nbsp;&nbsp;
                                        <i class="bx bx-heart"></i>&nbsp;42
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Course Item-->

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                        <div class="course-item">
                            <img src="{{ asset('assets') }}/img/course-3.jpg" class="img-fluid" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>Content</h4>
                                    <p class="price">$180</p>
                                </div>

                                <h3><a href="course-details.html">Copywriting</a></h3>
                                <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae
                                    dolores dolorem tempore.</p>
                                <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        <img src="{{ asset('assets') }}/img/trainers/trainer-3.jpg" class="img-fluid"
                                            alt="">
                                        <span>Brandon</span>
                                    </div>
                                    <div class="trainer-rank d-flex align-items-center">
                                        <i class="bx bx-user"></i>&nbsp;20
                                        &nbsp;&nbsp;
                                        <i class="bx bx-heart"></i>&nbsp;85
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Course Item-->

                </div>

            </div>
        </section><!-- End Popular Courses Section --> --}}
        {{-- berita dan pengumuman --}}
        <div class="container-md mt-3">
            <section id="popular-courses" class="courses">
                <div class="container" data-aos="fade-up">
                    <div class="mb-3">
                        <h2><b>Berita dan Pengumuman</b></h2>
                    </div>
                    <div class="row" data-aos="zoom-in" data-aos-delay="100">
                        @foreach ($berita as $dt)
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div class="course-item">
                                    <img src="{{ asset('gambarBerita/' . $dt->gambar) }}" class="img-fluid" alt="...">
                                    <div class="course-content">
                                        <h3><a href="/berita/detail/{{ $dt->id_berita }}">{{ $dt->judul_berita }}</a></h3>
                                        <p>{{ $dt->created_at }}</p>
                                        <div class="trainer d-flex justify-content-between align-items-center">
                                            <div class="trainer-rank d-flex align-items-center">
                                                <i class="bx bx-user"></i>&nbsp;50
                                                &nbsp;&nbsp;
                                                <i class="bx bx-heart"></i>&nbsp;65
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        <a href="{{ route('berita') }}" class="btn">Berita lainnya</a>
                    </div>
                </div>
            </section>
            <section id="popular-courses" class="courses">
                <div class="container" data-aos="fade-up">
                    <div class="mb-3">
                        <h2><b>Daftar Beasiswa</b></h2>
                    </div>
                    <div class="row" data-aos="zoom-in" data-aos-delay="100">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>BEASISWA</th>
                                        <th>MULAI PENDAFTARAN</th>
                                        <th>BATAS PENDAFTARAN</th>
                                        <th>MIN.IPK</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @forelse ($beasiswa as $dt)
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $dt->nama_beasiswa }}</td>
                                            <td>{{ $dt->mulai_pendaftaran }}</td>
                                            <td>{{ $dt->batas_pendaftaran }}</td>
                                            <td>{{ $dt->min_ipk }}</td>
                                        @empty
                                            <td colspan="5" style="text-align: center"><b>Belum ada beasiswa yang di
                                                    buka</b></td>
                                        @endforelse

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        <a href="{{ route('beasiswa') }}" class="btn">Beasiswa lainnya</a>
                    </div>
                </div>
            </section>
        </div>
        {{-- end berita dan pengumuman --}}

    </main>
@endsection
