@extends('layout.template_backend.app')
@section('content')
<div class="container-fluid">
    <div class="card col-8">
        <div class="card-body">
            <h3>Update Lembaga</h3>
            <form action="/lembaga/update/{{ $data->id_lemawa }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_lembaga">Nama Lembaga</label>
                    <input type="text" class="form-control" name="nama_lembaga" value="{{$data->nama_lembaga}}">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-select">
                        <option selected>{{$data->status}}</option>
                        <option value="aktif">Aktif</option>
                        <option value="non aktif">Non Aktif</option>
                    </select>
                </div>
                <img src="{{ asset('logoLembaga/' . $data->logo) }}" alt="" width="200px" height="auto">
                <div class="form-group">
                    <label for="logo">logo</label>
                    <input type="file" name="logo" class="form-control" accept="image/*">
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary">Kirim </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection