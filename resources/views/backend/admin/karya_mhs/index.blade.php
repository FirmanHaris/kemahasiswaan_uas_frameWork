@extends('layout.template_backend.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="{{route('formAdd_karya')}}" class="btn btn-primary"><i class="mdi mdi-plus-thick"></i></a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Jenis</th>
                        <th>Prodi Pencipta</th>
                        <th>Keterangan</th>
                        <th>Gambar</th>
                        <th>#</th>
                    </tr>
                </thead>
                @foreach ($data as $key => $value)
                <tbody>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->judul_karya }}</td>
                        <td>{{ $value->jenis_karya }}</td>
                        <td>{{ $value->prodi }}</td>
                        <td>
                            @php
                            echo $value->keterangan;
                            @endphp
                        </td>
                        <td><img src="{{ asset('gambar_Karya/' . $value->gambar_karya) }}" alt="" width="40"></td>
                        <td>
                            <a href="/karyaMhs/formUpdate/{{ $value->id_karya }}" class="btn btn-sm btn-warning"><i class="mdi mdi-pencil" title="update"></i></a>
                            <form action="/karyaMhs/delete/{{ $value->id_karya }}" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data  ? ')">
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