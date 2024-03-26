@extends('layouts.v_template')

@section('title', 'Siswa')

@section('content')
    <h1>Ini Halaman Siswa</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama siswa</th>
                <th>Kelas</th>
                <th>Mata Pelajaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nis }}</td>
                    <td>{{ $data->nama_siswa }}</td>
                    <td>{{ $data->kelas }}</td>
                    <td>{{ $data->mapel }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
