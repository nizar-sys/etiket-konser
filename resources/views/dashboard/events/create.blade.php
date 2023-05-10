@extends('layouts.app')
@section('title', 'Tambah Data Acara')

@section('title-header', 'Tambah Data Acara')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Data Acara</a></li>
    <li class="breadcrumb-item active">Tambah Data Acara</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Tambah Data Acara</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('events.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="nama_acara">Nama Acara</label>
                                    <input type="text" class="form-control @error('nama_acara') is-invalid @enderror" id="nama_acara"
                                        placeholder="Nama Acara" value="{{ old('nama_acara') }}" name="nama_acara">

                                    @error('nama_acara')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="harga_tiket">Harga Tiket</label>
                                    <input type="number" class="form-control @error('harga_tiket') is-invalid @enderror" id="harga_tiket"
                                        placeholder="Harga Tiket" value="{{ old('harga_tiket') }}" name="harga_tiket">

                                    @error('harga_tiket')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="tanggal_acara">Tanggal Acara</label>
                                    <input type="date" class="form-control @error('tanggal_acara') is-invalid @enderror" id="tanggal_acara"
                                        placeholder="Tanggal Acara" value="{{ old('tanggal_acara') }}" name="tanggal_acara">

                                    @error('tanggal_acara')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi"
                                        placeholder="Lokasi" value="{{ old('lokasi') }}" name="lokasi">

                                    @error('lokasi')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="poster">Poster</label>
                                    <input type="file" class="form-control @error('poster') is-invalid @enderror" id="poster"
                                        placeholder="Poster" value="{{ old('poster') }}" name="poster">

                                    @error('poster')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="deskripsi_acara">Deskripsi</label>
                                    <textarea class="form-control @error('deskripsi_acara') is-invalid @enderror" id="deskripsi_acara"
                                    placeholder="Deskripsi" name="deskripsi_acara" cols="30" rows="10">{{ old('deskripsi_acara') }}</textarea>

                                    @error('deskripsi_acara')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                <a href="{{route('events.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
