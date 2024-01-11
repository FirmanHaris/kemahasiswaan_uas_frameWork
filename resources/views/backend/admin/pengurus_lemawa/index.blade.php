@extends('layout.template_backend.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="{{route('formP_lemawa')}}" class="btn btn-primary"><i class="mdi mdi-plus-thick"></i></a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Lemawa</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Foto</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dt)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$dt->lemawa->nama_lembaga}}</td>
                        <td>{{$dt->nama}}</td>
                        <td>{{$dt->jabatan}}</td>
                        <td>
                            <img src="{{asset('fotoLemawa/'.$dt->foto)}}" alt="" width="40">
                        </td>
                        <td>
                            <a href="/pengurus_lemawa/formUpdate/{{$dt->id_pengurus_lemawa}}" class="btn btn-sm btn-warning"><i class="mdi mdi-pencil" title="update"></i></a>
                            <form action="" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kategori ? ')">
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