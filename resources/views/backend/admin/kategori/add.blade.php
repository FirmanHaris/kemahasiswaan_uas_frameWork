@extends('layout.template_backend.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3>Input Kategori</h3>
                            <form action="{{ route('insert_kategori') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <input type="text" name="nama_kategori" class="form-control" placeholder="Kategori..">
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