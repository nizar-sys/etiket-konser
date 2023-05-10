@extends('layouts.frontend')

@section('title', $event->nama_acara)

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/event_list.css') }}">
@endsection

@section('content')
    <form action="{{ route('event.order', []) }}" method="post">
        @csrf
        <input type="hidden" name="event_id" value="{{ $event->id }}">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="card-shadow">
                        <div class="card-body">
                            <img src="{{ asset('/uploads/images/posters/' . $event->poster) }}" alt="" class="w-100 mb-3">
    
                            {{ $event->deskripsi_acara }}
                        </div>
                        <div class="card-footer mt-2">
                            <h6 class="heading-small text-muted mb-4">Detail Pemesan</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="nama_pemesan">Nama Pemesan</label>
                                            <input type="text" id="nama_pemesan"
                                                class="form-control @error('nama_pemesan')
                                            is-invalid
                                            @enderror"
                                                placeholder="Nama Pemesan" name="nama_pemesan" value="{{ old('nama_pemesan') }}">
    
                                            @error('nama_pemesan')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="no_hp_pemesan">No HP Pemesan</label>
                                            <input type="number" id="no_hp_pemesan"
                                                class="form-control @error('no_hp_pemesan')
                                            is-invalid
                                            @enderror"
                                                placeholder="No HP Pemesan" name="no_hp_pemesan" value="{{ old('no_hp_pemesan') }}">
    
                                            @error('no_hp_pemesan')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="email_pemesan">Email Pemesan</label>
                                            <input type="email" id="email_pemesan"
                                                class="form-control @error('email_pemesan')
                                            is-invalid
                                            @enderror"
                                                placeholder="Email Pemesan" name="email_pemesan" value="{{ old('email_pemesan') }}">
    
                                            @error('email_pemesan')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="jumlah_tiket">Jumlah Tiket</label>
                                            <input type="number" id="jumlah_tiket"
                                                class="form-control @error('jumlah_tiket')
                                            is-invalid
                                            @enderror"
                                                placeholder="Jumlah Tiket" name="jumlah_tiket" value="{{ old('jumlah_tiket') }}" min="1">
    
                                            @error('jumlah_tiket')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card mt-4">
                        <div class="card-body mt-3">
                            <div class="product-name">{{ $event->nama_acara }}</div>
                            <div class="text-muted text-center mt-3 mb-5">{{ $event->formated_date }}</div>
                            <div class="d-flex align-items-center price mt-2">
                                Harga tiket <div class="font-weight-bold">: {{ $event->formated_price }}</div>
                            </div>
    
                            <div class="justify-content-center mt-3">
                                <button type="submit" class="btn btn-primary w-100">Beli Tiket</button>
                                <a href="{{ url('/', []) }}" class="btn btn-warning w-100 mt-3">Kembali Ke Beranda</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
