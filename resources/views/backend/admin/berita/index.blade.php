@extends('layout.template_backend.app')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('formadd_berita') }}" class="btn btn-primary"><i class="mdi mdi-plus-thick"></i></a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Berita</th>
                            <th>Slug</th>
                            <th>Kategori</th>
                            <th>Isi Berita</th>
                            <th>Gambar</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    @foreach ($data as $berita)
                        <tbody>
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $berita->judul_berita }}</td>
                                <td>{{ $berita->slug }}</td>
                                <td>{{ $berita->kategori->nama_kategori }}</td>
                                <td>@php
                                    echo $berita->isi_berita;
                                @endphp
                                </td>
                                <td>{{ $berita->gambar }}</td>
                                <td>
                                    <a href="/berita/formUpdate/{{ $berita->id_berita }}" class="btn btn-sm btn-warning"><i
                                            class="mdi mdi-pencil" title="update"></i></a>
                                    <form action="/berita/delete/{{ $berita->id_berita }}" method="post" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus berita ? ')">
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
