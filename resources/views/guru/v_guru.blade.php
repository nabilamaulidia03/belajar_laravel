@extends('layouts.v_template')

@section('title', 'Guru')

@section('content')
    <h1>ini Halaman guru</h1>
    @if (session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> SUCCESS!</h4>
            {{ session('pesan') }}
        </div>
    @endif
    <a href="/guru/add" class="btn btn-sm btn-primary">ADD</a><br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Guru</th>
                <th>Mata Pelajaran</th>
                <th>Foto Guru</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guru as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nip }}</td>
                    <td>{{ $data->nama_guru }}</td>
                    <td>{{ $data->mapel }}</td>
                    <td><img src="{{ url('img/' . $data->foto_guru) }}" alt="foto {{ $data->nama_guru }}" width="100px">
                    </td>
                    <td>
                        <a href="/guru/detail/{{ $data->id_guru }}" class="btn btn-sm btn-success">Detail</a>
                        <a href="/guru/edit/{{ $data->id_guru }}" class="btn btn-sm btn-warning">Edit</a>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                            data-target="#delete{{ $data->id_guru }}">
                            delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Modal -->
    @foreach ($guru as $data)
        <div class="modal modal-danger fade" id="delete{{ $data->id_guru }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Danger Modal</h4>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda Yakin Ingin Menghapus Data Ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                        <form action="/guru/delete/{{ $data->id_guru }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline">Yes</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
@endsection
