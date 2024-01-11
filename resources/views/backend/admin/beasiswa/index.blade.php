@extends('layout.template_backend.app')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('insert_beasiswa') }}" class="btn btn-primary"><i class="mdi mdi-plus-thick"></i></a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Beasiswa</th>
                            <th>Jenis Beasiswa</th>
                            <th>Mulai Pendaftaran</th>
                            <th>Batas Pendaftaran</th>
                            <th>Min Ipk</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    @foreach ($data as $beasiswa)
                        <tbody>
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $beasiswa->nama_beasiswa }}</td>
                                <td>{{ $beasiswa->jenis_beasiswa }}</td>
                                <td>{{ $beasiswa->mulai_pendaftaran }}</td>
                                <td>{{ $beasiswa->batas_pendaftaran }}</td>
                                <td>{{ $beasiswa->min_ipk }}</td>
                                <td>
                                    <a href="/beasiswa/formUpdate/{{ $beasiswa->id_beasiswa }}"
                                        class="btn btn-sm btn-warning"><i class="mdi mdi-pencil" title="update"></i></a>
                                    <form action="/beasiswa/delete/{{ $beasiswa->id_beasiswa }}" method="post"
                                        class="d-inline" onsubmit="return confirm('Yakin ingin menghapus beasiswa ini ? ')">
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
