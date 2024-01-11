@extends('layout.__app')
@section('content')
<div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
        <h2>Karya Mahasiswa</h2>
        <p>Karya dan Produk yang dihasilkan oleh mahasiswa Teknik Informatika STMIK Lombok</p>
    </div>
</div>
@foreach($karya as $ti)
<div class="container-md mt-5">
    <div class="row" data-aos="zoom-in" data-aos-delay="100">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-2">
            <div class="card mb-3">
                <div class="card-body">
                    <img src=" {{ asset('gambar_karya/' . $ti->gambar_karya) }} " class="img-fluid" alt="">
                    <h5>{{$ti->judul_karya}}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection