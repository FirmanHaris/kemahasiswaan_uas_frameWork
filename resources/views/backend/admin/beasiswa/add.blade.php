@extends('layout.template_backend.app')
@section('content')
    <div class="container-fluid">
        <div class="card col-8">
            <div class="card-body">
                <h3>Input Beasiswa</h3>
                <form action="{{ route('insert_beasiswa') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_beasiswa">Nama Beasiswa</label>
                        <input type="text" class="form-control" name="nama_beasiswa">
                    </div>
                    <div class="form-group">
                        <label for="jenis_beasiswa">Jenis Beasiswa</label>
                        <input type="text" class="form-control" name="jenis_beasiswa">
                    </div>
                    <div class="form-group">
                        <label for="mulai_pendaftaran">Mulai Pendaftaran</label>
                        <input type="date" name="mulai_pendaftaran" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="batas_pendaftaran">Batas Pendaftaran</label>
                        <input type="date" name="batas_pendaftaran" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="min_ipk">Minimal IPK</label>
                        <input type="number" step="any" name="min_ipk" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Kirim </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
