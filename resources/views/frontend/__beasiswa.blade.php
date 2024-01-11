@extends('layout.__app')
@section('content')
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>Beasiswa</h2>
            <p>Daftar Beasiswa Mahasiswa STMIK Lombok </p>
        </div>
    </div>
    <div class="container-md mt-5">
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
                        @forelse ($data as $dt)
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dt->nama_beasiswa }}</td>
                            <td>{{ $dt->mulai_pendaftaran }}</td>
                            <td>{{ $dt->batas_pendaftaran }}</td>
                            <td>{{ $dt->min_ipk }}</td>
                        @empty
                            <td colspan="5" style="text-align: center"><b>Belum ada beasiswa yang di buka</b></td>
                        @endforelse

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
