@extends('layout.template_backend.app')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('formadd_dokumen') }}" class="btn btn-primary"><i class="mdi mdi-plus-thick"></i></a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Document</th>
                            <th>jenis</th>
                            <th>dokumen</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dt->nama_dokumen }}</td>
                                <td>{{ $dt->jenis }}</td>
                                <td>{{ $dt->dokumen }}</td>
                                <td>
                                    <a href="/dokumen/formUpdate/{{ $dt->id_dokumen }}" class="btn btn-sm btn-warning"><i
                                            class="mdi mdi-pencil" title="update"></i></a>
                                    <form action="/dokumen/delete/{{ $dt->id_dokumen }}" method="post" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus dokumen ini ? ')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger"><i class="mdi mdi-delete"
                                                title="delete"></i></button>
                                    </form>
                                </td>
                            </tr>
                    </tbody>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
@endsection
