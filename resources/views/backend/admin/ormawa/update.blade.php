@extends('layout.template_backend.app')
@section('content')
    <div class="container-fluid">
        <div class="card col-8">
            <div class="card-body">
                <h3>Update Ormawa</h3>
                <form action="/ormawa/update/{{ $data->id_ormawa }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nama_ormawa">Nama Organisasi</label>
                        <input type="text" class="form-control" name="nama_ormawa" value="{{ $data->nama_ormawa }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status"class="form-select">
                            <option selected>{{ $data->status }}</option>
                            <option value="aktif">Aktif</option>
                            <option value="non aktif">Non Aktif</option>
                        </select>
                    </div>
                    <img src="{{ asset('logoUkm/' . $data->logo) }}" alt="" width="200px" height="auto">
                    <div class="form-group">
                        <label for="ketua">Logo</label>
                        <input type="file" class="form-control" name="logo" accept="image/*">
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Kirim </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
