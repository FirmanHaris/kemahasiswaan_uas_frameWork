@extends('layout.template_backend.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <a href="{{ route('formadd_ormawa') }}" class="btn btn-primary"><i class="mdi mdi-plus-thick"></i></a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Organisasi</th>
                        <th>Status</th>
                        <th>Logo</th>
                        <th>#</th>
                    </tr>
                </thead>
                @foreach ($data as $key => $value)
                <tbody>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->nama_ormawa }}</td>
                        <td>{{ $value->status }}</td>
                        <td><img src="{{ asset('logoUkm/' . $value->logo) }}" alt="" width="40"></td>

                        <td>
                            <a href="/ormawa/update/{{ $value->id_ormawa }}" class="btn btn-sm btn-warning"><i class="mdi mdi-pencil" title="update"></i></a>
                            <a href="/ormawa/update/{{ $value->id_ormawa }}" class="btn btn-sm btn-success"><i class="mdi mdi-details" title="detail"></i></a>
                            <form action="/ormawa/delete/{{ $value->id_ormawa }}" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data Ormawa ? ')">
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

@section('script')
<script>
    $('#btn-detail').on('click', function() {
        let ind = JSON.parse($(this).attr('data-key'));
        let asset = $(this).attr('data-img');
        $('#card-detail').toggle(function() {
            $(this).html(`<div class="card"><div class="card-body">
                    <h3> UKM ${ind.nama_ormawa} </h3>
                    <img src="${asset}logoUkm/${ind.logo}" width="100" alt="">
                </div></div>`

            );
        })
    });
</script>
@endsection