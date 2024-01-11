@extends('layout.template_backend.app')
@section('content')
    <div class="container-fluid">
        <div class="card col-8">
            <div class="card-body">
                <h3>Update Berita</h3>
                <form action="/berita/update/{{ $berita->id_berita }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="judul_berita">Judul Berita</label>
                        <input type="text" class="form-control" name="judul_berita" value="{{ $berita->judul_berita }}">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select name="id_kategori"class="form-select">
                            <option selected value="{{ $berita->id_kategori }}">{{ $berita->kategori->nama_kategori }}
                            </option>
                            @foreach ($kategori as $ktgr)
                                <option value="{{ $ktgr->id_kategori }}">{{ $ktgr->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Isi Berita</label>
                        <textarea name="isi_berita" id="teksedtor">{{ $berita->isi_berita }}</textarea>
                    </div>
                    <img src="{{ asset('gambarBerita/' . $berita->gambar) }}" alt="" width="200px" height="auto">
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
