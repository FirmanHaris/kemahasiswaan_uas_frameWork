@extends('layout.__app')
@section('content')
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>{{ $data->nama_ormawa }}</h2>
        </div>
    </div>
    <div class="container-md mt-5">
        <div class="card">
            <div class="card-body">
                <div>@php
                    echo $data->detail_ormawa;
                @endphp</div>
            </div>
        </div>
    </div>
@endsection
