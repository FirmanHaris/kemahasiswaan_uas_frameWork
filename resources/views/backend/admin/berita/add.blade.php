@extends('layout.template_backend.app')
@section('content')
<div class="container-fluid">
    <div class="card col-8">
        <div class="card-body">
            <h3>Input Berita</h3>
            <form action="{{ route('insertBerita') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="judul_berita">Judul Berita</label>
                    <input type="text" class="form-control" name="judul_berita">
                    @if (count($errors) > 0)
                    <div style="width:auto;color:#dc4c64;margin-top:0.25rem">
                        {{ $errors->first('judul_berita') }}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select name="id_kategori" class="form-select">
                        <option selected>Pilih Kategori...</option>
                        @foreach ($kategori as $ktgr)
                        <option value="{{ $ktgr->id_kategori }}">{{ $ktgr->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Isi Berita</label>
                    <textarea name="isi_berita" id="teksedtor"></textarea>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" class="form-control" accept="image/*">
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary">Kirim </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection