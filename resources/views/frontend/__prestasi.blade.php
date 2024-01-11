@extends('layout.__app')
@section('content')
<div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
        <h2>Prestasi</h2>
        <p>Daftar Prestasi Mahasiswa STMIK Lombok </p>
    </div>
</div>
<div class="container mt-5" data-aos="fade-up">
    <div class="row" data-aos="zoom-in" data-aos-delay="100">
        @foreach ($data as $dt)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-2">
            <div class="course-item">
                <img src="{{ asset('gambarPrestasi/' . $dt->gambar_kegiatan) }}" class="img-fluid" alt="...">
                <div class="course-content">
                    <h3><a style="color:black" href="">{{ $dt->nama_kegiatan }}</a></h3>
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
    </div>
</div>
@endsection