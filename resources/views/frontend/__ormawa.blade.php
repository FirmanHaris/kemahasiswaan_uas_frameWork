@extends('layout.__app')
@section('content')
<div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
        <h2>Ormawa</h2>
        <p>Organisasi Mahasiswa STMIK Lombok </p>
    </div>
</div>
<div class="container-md mt-5">
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>NO</th>
                    <th>NAMA ORGANISASI</th>
                    <th>STATUS</th>
                    <th>KETUA</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $dt)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dt->ormawa->nama_ormawa }}</td>
                    <td>{{ $dt->ormawa->status }}</td>
                    <td>{{ $dt->nama }}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-warning">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection