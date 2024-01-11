@extends('layout.__app')
@section('content')
<div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
        <h2>Berita & Pengumuman</h2>
        <p>Berita, Pengumuman dan Informasi terkait Kemahasiswaan STMIK Lombok </p>
    </div>
</div>
<section id="courses" class="courses">
    <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            @foreach ($data as $dt)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-2">
                <div class="course-item">
                    <img src="{{ asset('gambarBerita/' . $dt->gambar) }}" class="img-fluid" alt="...">
                    <div class="course-content">
                        <h3><a href="/berita/detail/{{ $dt->id_berita }}">{{ $dt->judul_berita }}</a></h3>
                        <p>{{ $dt->created_at }}</p>
                        <div class="trainer d-flex justify-content-between align-items-center">
                            <div class="trainer-profile d-flex align-items-center">
                            </div>
                            <div class="trainer-rank d-flex align-items-center">
                                <i class="bx bx-user"></i>&nbsp;0
                                &nbsp;&nbsp;
                                <i class="bx bx-heart"></i>&nbsp;0
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- End Course Item-->
            {{--
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                    <div class="course-item">
                        <img src="assets/img/course-2.jpg" class="img-fluid" alt="...">
                        <div class="course-content">

                            <h3><a href="course-details.html">Search Engine Optimization</a></h3>
                            <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores
                                dolorem tempore.</p>
                            <div class="trainer d-flex justify-content-between align-items-center">
                                <div class="trainer-profile d-flex align-items-center">
                                    <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
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
                        <img src="assets/img/course-3.jpg" class="img-fluid" alt="...">
                        <div class="course-content">

                            <h3><a href="course-details.html">Copywriting</a></h3>
                            <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores
                                dolorem tempore.</p>
                            <div class="trainer d-flex justify-content-between align-items-center">
                                <div class="trainer-profile d-flex align-items-center">
                                    <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
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
                </div> <!-- End Course Item--> --}}

        </div>

    </div>
</section>
@endsection