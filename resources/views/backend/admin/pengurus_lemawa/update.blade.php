@extends('layout.template_backend.app')
@section('content')
<div class="container-fluid">
    <div class="card col-8">
        <div class="card-body">
            <h3>Update Pengurus Lemawa</h3>
            <form action="/pengurus_lemawa/update/{{$data->id_pengurus_lemawa}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{$data->nama}}">
                </div>
                <div class="form-group">
                    <label for="id_lemawa">Lemawa</label>
                    <select name="id_lemawa" class="form-select">
                        <option selected value="{{$data->id_lemawa}}">{{$data->lemawa->nama_lembaga}}</option>
                        @foreach($lemawa as $org)
                        <option value="{{$org->id_lemawa}}">{{$org->nama_lembaga}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <select name="jabatan" class="form-select">
                        <option selected>{{$data->jabatan}}</option>
                        <option value="ketua">Ketua</option>
                        <option value="sekretaris">Sekretaris</option>
                        <option value="bendahara">Bendahara</option>
                    </select>
                </div>
                <img src="{{ asset('fotoLemawa/' . $data->foto) }}" alt="" width="200px" height="auto">
                <div class="form-group">
                    <label for="foto">foto</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary">Kirim </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection