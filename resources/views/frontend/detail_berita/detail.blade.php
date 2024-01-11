@extends('layout.__app')
@section('content')
<div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
        <h2>{{ $data->judul_berita }}</h2>
    </div>
</div>
<div class="container-md mt-5">
    <div class="row">
        <div class="col-md-8 col-xxl-8 col-xl-8 col-sm-12">
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                <div class="mb-5">
                    <img src="{{ asset('gambarBerita/' . $data->gambar) }}" alt="" class="w-100">
                    <p>{{ $data->created_at }}</p>
                </div>
                <div class="w-100">
                    @php
                    echo $data->isi_berita;
                    @endphp

                </div>
                <div>
                    <a href="" class="btn btn-outline-primary">Umum</a>
                    <a href="" class="btn btn-outline-primary">Prestasi</a>
                    <a href="" class="btn btn-outline-primary">Beasiswa</a>
                </div>
                <!-- End Course Item-->
            </div>
        </div>
        {{-- aside --}}
        {{-- @include('frontend.__aside') --}}

    </div>

</div>
</div>
@endsection