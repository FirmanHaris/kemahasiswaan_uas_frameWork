@extends('layout.template_backend.app')
@section('content')
    <div class="container-fluid">
        <h2>Selamat Datang {{ auth()->user()->name }} Di Dashboard</h2>
    </div>
@endsection
