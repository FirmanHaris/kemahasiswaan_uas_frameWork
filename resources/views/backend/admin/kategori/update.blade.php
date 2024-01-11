@extends('layout.template_backend.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3>Update Kategori</h3>
                            <form action="/kategori/update/{{ $data->id_kategori }}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <input type="text" name="nama_kategori" value="{{ $data->nama_kategori }}" class="form-control">
                                </div>
                                <button class="btn btn-primary mt-3"> Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection