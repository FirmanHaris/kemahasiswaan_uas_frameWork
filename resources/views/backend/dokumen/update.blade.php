@extends('layout.template_backend.app')
@section('content')
    <div class="container-fluid">
        <div class="card col-8">
            <div class="card-body">
                <h3>Update Dokumen</h3>
                <form action="/dokumen/update/{{ $dokumen->id_dokumen }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nama_dokumen">Nama Dokumen</label>
                        <input type="text" class="form-control" name="nama_dokumen" value="{{ $dokumen->nama_dokumen }}">
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <select name="jenis"class="form-select">
                            <option selected>{{ $dokumen->jenis }}</option>
                            <option value="ami">AMI</option>
                            <option value="simkatmawa">Simkatmawa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dokumen">dokumen</label>
                        <input type="file" name="dokumen" class="form-control" accept="application/pdf">
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Kirim </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
