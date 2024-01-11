@extends('layout.template_backend.app')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('formadd_prestasi') }}" class="btn btn-primary"><i class="mdi mdi-plus-thick"></i></a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kegiatan</th>
                            <th>Slug</th>
                            <th>Tanggal Kegiatan</th>
                            <th>Gambar</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    @foreach ($data as $prestasi)
                        <tbody>
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $prestasi->nama_kegiatan }}</td>
                                <td>{{ $prestasi->slug }}</td>
                                <td>{{ $prestasi->tgl_kegiatan }}</td>
                                <td>{{ $prestasi->gambar_kegiatan }}</td>
                                <td>
                                    <a href="/prestasi/formUpdate/{{ $prestasi->id_prestasi }}"
                                        class="btn btn-sm btn-warning"><i class="mdi mdi-pencil" title="update"></i></a>
                                    <form action="/prestasi/delete/{{ $prestasi->id_prestasi }}" method="post"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus data prestasi ? ')">
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
