@extends('layout.template_backend.app')
@section('content')
<div class="container-fluid">
    <div class="card col-8">
        <div class="card-body">
            <h3>Update Pengurus Ormawa</h3>
            <form action="/pengurus_ormawa/update/{{$data->id_pengurus}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{$data->nama}}">
                </div>
                <div class="form-group">
                    <label for="id_ormawa">Ormawa</label>
                    <select name="id_ormawa" class="form-select">
                        <option selected value="{{$data->id_ormawa}}">{{$data->ormawa->nama_ormawa}}</option>
                        @foreach($ormawa as $ukm)
                        <option value="{{$ukm->id_ormawa}}">{{$ukm->nama_ormawa}}</option>
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
                    <img src="{{ asset('fotoOrmawa/' . $data->foto) }}" alt="" width="200px" height="auto">
                </div>
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