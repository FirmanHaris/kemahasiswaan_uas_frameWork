@extends('layout.template_backend.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="{{ route('formadd_lemawa') }}" class="btn btn-primary"><i class="mdi mdi-plus-thick"></i></a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lembaga</th>
                        <th>Status</th>
                        <th>Logo</th>
                        <th>#</th>
                    </tr>
                </thead>
                @foreach ($data as $key => $value)
                <tbody>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->nama_lembaga }}</td>
                        <td>{{ $value->status }}</td>
                        <td><img src="{{ asset('logoLembaga/' . $value->logo) }}" alt="" width="40"></td>

                        <td>
                            <a href="/lembaga/formUpdate/{{ $value->id_lemawa }}" class="btn btn-sm btn-warning"><i class="mdi mdi-pencil" title="update"></i></a>
                            <a href="/lemawa/update/{{ $value->id_lemawa }}" class="btn btn-sm btn-success"><i class="mdi mdi-details" title="detail"></i></a>
                            <form action="/lembaga/delete/{{ $value->id_lemawa }}" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data Lemawa ? ')">
                                @method('delete')
                                @csrf
                                <button class="btn btn-sm btn-danger"><i class="mdi mdi-delete" title="delete"></i></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
    <div class="justify-content-center" id="card-detail" style="display: none;"></div>
</div>
@endsection