@extends('layout.template_backend.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="{{route('register')}}" class="btn btn-primary"><i class="mdi mdi-plus-thick"></i></a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dt)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dt->name }}</td>
                        <td>{{ $dt->email }}</td>
                        <td>{{ $dt->role }}</td>
                        <td>
                            <form action="/user/delete/{{ $dt->id }}" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus User {{$dt->name}}? ')">
                                @method('delete')
                                @csrf
                                <button class="btn btn-sm btn-danger"><i class="mdi mdi-delete" title="delete"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection