@extends('layout.template_backend.app')
@section('content')
<div class="container-fluid">
    <div class="card col-8">
        <div class="card-body">
            <h3>Input Pengurus Ormawa</h3>
            <form action="{{route('insertP_ormawa')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="id_ormawa">Ormawa</label>
                    <select name="id_ormawa" class="form-select">
                        <option selected>Pilih Ormawa...</option>
                        @foreach($ormawa as $ukm)
                        <option value="{{$ukm->id_ormawa}}">{{$ukm->nama_ormawa}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <select name="jabatan" class="form-select">
                        <option selected>Pilih Jabatan...</option>
                        <option value="ketua">Ketua</option>
                        <option value="sekretaris">Sekretaris</option>
                        <option value="bendahara">Bendahara</option>
                    </select>
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