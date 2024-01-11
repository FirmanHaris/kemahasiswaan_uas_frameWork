@extends('layout.template_backend.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <form action="{{ route('registerAdd') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" class="form-select">
                                <option selected>Pilih Role...</option>
                                <option value="admin">Admin</option>
                                <option value="mahasiswa">Mahasiswa</option>
                            </select>
                        </div>
                        <button class="btn btn-primary mt-3"> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection