@extends ('layouts.v_template')
@section('title', 'Detail Guru')
@section('content')
    <table class="table">
        <tr>
            <th width="150px">NIP</th>
            <th width="30px">:</th>
            <th>{{ $guru[0]->nip }}</th>
        </tr>
        <tr>
            <th width="150px">NAMA GURU</th>
            <th width="30px">:</th>
            <th>{{ $guru[0]->nama_guru }}</th>
        </tr>
        <tr>
            <th width="150px">MATA PELAJARAN</th>
            <th width="30px">:</th>
            <th>{{ $guru[0]->mapel }}</th>
        </tr>
        <tr>
            <th width="150px">FOTO</th>
            <th width="30px">:</th>
            <th><img src="{{ url('img/' . $guru[0]->foto_guru) }}" width="200px"></th>
        </tr>
    </table>
@endsection
