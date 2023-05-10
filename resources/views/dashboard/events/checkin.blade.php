@extends('layouts.app')
@section('title', 'Input Penggunaan Tiket')

@section('title-header', 'Input Penggunaan Tiket')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Data Acara</a></li>
    <li class="breadcrumb-item active">Input Penggunaan Tiket</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Input Penggunaan Tiket</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('checkin.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="kode_pemesanan">Kode unik tiket</label>
                                    <input type="text" class="form-control @error('kode_pemesanan') is-invalid @enderror" id="kode_pemesanan"
                                        placeholder="Kode unik tiket" value="{{ old('kode_pemesanan') }}" name="kode_pemesanan">

                                    @error('kode_pemesanan')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Gunakan Tiket</button>
                                <a href="{{route('events.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
