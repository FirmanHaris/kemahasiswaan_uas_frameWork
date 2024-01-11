@extends('layout.template_backend.app')
@section('content')
<div class="container-fluid">
    <div class="card col-8">
        <div class="card-body">
            <h3>Input Karya</h3>
            <form action="{{ route('add_karya') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="judul_karya">Judul Karya</label>
                    <input type="text" class="form-control" name="judul_karya">
                </div>
                <div class="form-group">
                    <label for="jenis_karya">Jenis Karya</label>
                    <select name="jenis_karya" class="form-select">
                        <option selected>Pilih Jenis Karya...</option>
                        <option value="teknologi">Teknologi</option>
                        <option value="non teknologi">Non Teknologi</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="prodi">Prodi Pencipta</label>
                    <select name="prodi" class="form-select">
                        <option selected>Pilih Prodi...</option>
                        <option value="teknik informatika">Teknik Informatika</option>
                        <option value="sistem informasi">Sistem Informasi</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <textarea name="keterangan" id="teksedtor"></textarea>
                </div>
                <div class="form-group">
                    <label for="gambar_karya">Gambar</label>
                    <input type="file" name="gambar_karya" class="form-control" accept="image/*">
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary">Kirim </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection