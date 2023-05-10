@extends('layouts.frontend')

@section('title', $event->nama_acara)

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/event_list.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="card-shadow">
                    <div class="card-body">
                        <img src="{{ asset('/uploads/images/posters/' . $event->poster) }}" alt="" class="w-100 mb-3">

                        {{ $event->deskripsi_acara }}
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
                            <form action="{{ route('event.checkout', ['event' => str()->slug($event->nama_acara)]) }}" method="get">
                                @csrf
                                <button type="submit"
                                    class="btn btn-primary w-100">Beli Tiket</button>
                            </form>
                            <a href="{{ url('/', []) }}"
                                class="btn btn-warning w-100 mt-3">Kembali Ke Beranda</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
