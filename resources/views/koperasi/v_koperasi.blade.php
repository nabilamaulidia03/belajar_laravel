@extends('layouts.v_template')

@section('title', 'Koperasi')

@section('content')
    <h1>ini Halaman Koperasi</h1>
    <a href="/koperasi/print" target="_blank" class="btn btn-primary">Print To Printer</a>
    <a href="/koperasi/printpdf" target="_blank" class="btn btn-success">Print To PDF</a>
    @if (session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> SUCCESS!</h4>
            {{ session('pesan') }}
        </div>
    @endif
    <a href="/koperasi/add" class="btn btn-primary">ADD</a><br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>No Faktur</th>
                <th>Pelanggan</th>
                <th>Tangal</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($koperasi as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->no_faktur }}</td>
                    <td>{{ $data->pelanggan }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->total }}</td>
                    </td>
                    <td>
                        <a href="/koperasi/detail/{{ $data->id_koperasi }}" class="btn btn-sm btn-success">Detail</a>
                        <a href="/koperasi/edit/{{ $data->id_koperasi }}" class="btn btn-sm btn-warning">Edit</a>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                            data-target="#delete{{ $data->id_koperasi }}">
                            delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Modal -->
    @foreach ($koperasi as $data)
        <div class="modal modal-danger fade" id="delete{{ $data->id_koperasi }}">
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
                        <form action="/koperasi/delete/{{ $data->id_koperasi }}" method="post">
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
