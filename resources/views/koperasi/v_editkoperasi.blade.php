@extends('layouts.v_template')
@section('title', 'Edit Koperasi')
@section('content')
    <form action="/koperasi/update/{{ $koperasi[0]->id_koperasi }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>NO FAKTUR</label>
                        <input name="no_faktur" class="form-control" value="{{ $koperasi[0]->no_faktur }}" readonly>
                        <div class="text-danger">
                            @error('no_faktur')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>PELANGGAN</label>
                        <input name="pelanggan" class="form-control" value="{{ $koperasi[0]->pelanggan }}">
                        <div class="text-danger">
                            @error('pelanggan')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>TANGGAL</label>
                        <input name="tanggal" class="form-control" value="{{ $koperasi[0]->tanggal }}">
                        <div class="text-danger">
                            @error('tanggal')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>TOTAL</label>
                        <input name="total" class="form-control" value="{{ $koperasi[0]->total }}">
                        <div class="text-danger">
                            @error('total')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary">SIMPAN</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
