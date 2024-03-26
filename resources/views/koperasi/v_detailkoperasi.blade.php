@extends ('layouts.v_template')
@section('title', 'Detail koperasi')
@section('content')
    <table class="table">
        <tr>
            <th width="150px">NO FAKTUR</th>
            <th width="30px">:</th>
            <th>{{ $koperasi[0]->no_faktur }}</th>
        </tr>
        <tr>
            <th width="150px">PELANGGAN</th>
            <th width="30px">:</th>
            <th>{{ $koperasi[0]->pelanggan }}</th>
        </tr>
        <tr>
            <th width="150px">TANGGAL</th>
            <th width="30px">:</th>
            <th>{{ $koperasi[0]->tanggal }}</th>
        </tr>
        <tr>
            <th width="150px">TOTAL</th>
            <th width="30px">:</th>
            <th>{{ $koperasi[0]->total }}</th>
        </tr>
    </table>
@endsection
