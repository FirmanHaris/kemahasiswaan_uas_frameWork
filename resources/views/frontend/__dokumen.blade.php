@extends('layout.__app')
@section('content')
<div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
        <h2>Dokumen Kemahasiswaan</h2>
        <p>Untuk dapat mengakses Dokumen, Pastikan Anda Login menggunakan Nim </p>
    </div>
</div>
<div class="container-md mt-5 ">
    <div class="row">
        <div class="col-6">
            <h3><b>Dokumen AMI(Audit Mutu Internal)</b></h3>
            <ul>
                @forelse($ami as $am)
                <li>{{$am->nama_dokumen}}</li>
                @empty
                <p><b>dokumen kosong</b></p>
                @endforelse
            </ul>
        </div>
        <div class="col-6">
            <h3><b>Dokumen Simkatmawa</b></h3>
            <ul>
                @forelse($simkatmawa as $sim)
                <li>{{$sim->nama_dokumen}}</li>
                @empty
                <p><b>dokumen kosong</b></p>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection