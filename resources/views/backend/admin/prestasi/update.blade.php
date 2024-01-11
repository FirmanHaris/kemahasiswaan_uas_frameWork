@extends('layout.template_backend.app')
@section('content')
    <div class="container-fluid">
        <div class="card col-8">
            <div class="card-body">
                <h3>Update Prestasi</h3>
                <form action="/prestasi/update/{{ $prestasi->id_prestasi }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nama_kegiatan">Kegiatan</label>
                        <input type="text" class="form-control" name="nama_kegiatan"
                            value="{{ $prestasi->nama_kegiatan }}">
                    </div>
                    <div class="form-group">
                        <label for="tgl_kegiatan">Tanggal Kegiatan</label>
                        <input type="date" class="form-control" name="tgl_kegiatan"
                            value="{{ $prestasi->tgl_kegiatan }}">
                    </div>
                    <img src="{{ asset('gambarPrestasi/' . $prestasi->gambar_kegiatan) }}" alt="" width="200px"
                        height="auto">
                    <div class="form-group">
                        <label for="gambar_kegiatan">Gambar</label>
                        <input type="file" name="gambar_kegiatan" class="form-control" accept="image/*">
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Kirim </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
