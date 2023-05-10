@extends('layouts.frontend')

@section('title', $order->event->nama_acara)

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/event_list.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="card-shadow">
                    <div class="card-body">
                        <img src="{{ asset('/uploads/images/posters/' . $order->event->poster) }}" alt=""
                            class="w-100 mb-3">

                        {{ $order->event->deskripsi_acara }}
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="card h-75 mt-4">
                    <div class="card-body mt-3">
                        <div class="product-name">{{ $order->event->nama_acara }}</div>
                        <div class="text-muted text-center mt-3 mb-5">{{ $order->event->formated_date }}</div>
                        <div class="d-flex align-items-center price mt-2">
                            Harga tiket <div class="font-weight-bold">: {{ $order->event->formated_price }}</div>
                        </div>
                        <div class="d-flex align-items-center price mt-2">
                            Jumlah tiket <div class="font-weight-bold">: {{ $order->jumlah_tiket }}</div>
                        </div>
                        <div class="d-flex align-items-center price mt-2">
                            Nama Pemesan <div class="font-weight-bold">: {{ $order->nama_pemesan }}</div>
                        </div>

                        <div class="justify-content-center mt-3">
                            <a href="{{ route('event.order.print', ['id'=> $order->id]) }}" target="_blank" class="btn btn-danger w-100">Print Tiket</a>
                            <a href="{{ url('/', []) }}" class="btn btn-warning w-100 mt-3">Kembali Ke Beranda</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
