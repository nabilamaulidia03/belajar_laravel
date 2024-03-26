@extends('layouts.v_template')
@section('title', 'Edit Guru')
@section('content')
    <form action="/guru/update/{{ $guru[0]->id_guru }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>NIP</label>
                        <input name="nip" class="form-control" value="{{ $guru[0]->nip }}" readonly>
                        <div class="text-danger">
                            @error('nip')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>NAMA GURU</label>
                        <input name="nama_guru" class="form-control" value="{{ $guru[0]->nama_guru }}">
                        <div class="text-danger">
                            @error('nama_guru')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>MATA PELAJARAN</label>
                        <input name="mapel" class="form-control" value="{{ $guru[0]->mapel }}">
                        <div class="text-danger">
                            @error('mapel')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm 12">
                        <div class="col-sm-4">
                            <img src="{{ url('img/' . $guru[0]->foto_guru) }}" width="100px">
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>GANTI FOTO GURU</label>
                                <input type="file" name="foto_guru" class="form-control">
                                <div class="text-danger">
                                    @error('foto_guru')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
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
