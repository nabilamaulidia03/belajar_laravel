@extends('layouts.v_template')

@section('title', 'Add Koperasi')

@section('content')
    <form action="/koperasi/insert" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>NO FAKTUR</label>
                        <input name="no_faktur" class="form-control" value="{{ old('no_faktur') }}">
                        <div class="text-danger">
                            @error('no_faktur')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>PELANGGAN</label>
                        <input name="pelanggan" class="form-control" value="{{ old('pelanggan') }}">
                        <div class="text-danger">
                            @error('pelanggan')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>TANGGAL</label>
                        <input name="tanggal" class="form-control" type="date" value="{{ old('tanggal') }}">
                        <div class="text-danger">
                            @error('tanggal')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>TOTAL</label>
                        <input name="total" class="form-control" value="{{ old('total') }}">
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
