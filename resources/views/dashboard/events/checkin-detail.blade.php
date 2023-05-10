@extends('layouts.app')
@section('title', 'Checkin Detil')

@section('title-header', 'Checkin Detil')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Checkin Detil</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-8">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="card-title">Detil Acara</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-flush table-hover" id="data-acara">
                            <thead>
                                <tr>
                                    <th>Tanggal Acara</th>
                                    <th>Nama Acara</th>
                                    <th>Harga Tiket</th>
                                    <th>Deskripsi</th>
                                    <th>Poster</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $order->event->formated_date }}</td>
                                    <td>{{ $order->event->nama_acara }}</td>
                                    <td>{{ $order->event->formated_price }}</td>
                                    <td>{{ str()->words($order->event->deskripsi_acara, 7, ' ...') }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/images/posters/' . $order->event->poster) }}"
                                            alt="" width="100px">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="card-title">Detil Pemesan</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul>
                        <li>Nama Pemesan : {{ $order->nama_pemesan }}</li>
                        <br>
                        <li>Email Pemesan : {{ $order->email_pemesan }}</li>
                        <br>
                        <li>No. HP Pemesan : {{ $order->no_hp_pemesan }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('/uploads/images/posters/' . $order->event->poster) }}" alt=""
                        class="w-100 mb-3">

                    {{ $order->event->deskripsi_acara }}
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <div class="card-body mt-3">
                    <div class="product-name">{{ $order->event->nama_acara }}</div>
                    <div class="text-muted text-center mt-3 mb-5">{{ $order->event->formated_date }}</div>
                    <div class="d-flex align-items-center price mt-2">
                        Harga tiket <div class="font-weight-bold">: {{ $order->event->formated_price }}</div>
                    </div>
                    <div class="d-flex align-items-center price mt-2">
                        Jumlah Tiket <div class="font-weight-bold">: {{ $order->jumlah_tiket }}</div>
                    </div>
                    <div class="d-flex align-items-center price mt-2">
                        Total Harga <div class="font-weight-bold">: Rp.
                            {{ number_format($order->jumlah_tiket * $order->event->harga_tiket, 0, ',', '.') }}</div>
                    </div>

                    <div class="justify-content-center mt-3">
                        <a href="{{ route('event.order.print', $order->id) }}" class="btn btn-warning w-100 mt-3"
                            target="_blank">Print Tiket</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var datatable = $('#data-acara').DataTable({
            processing: false,
            responsive: false,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Cari Data",
                lengthMenu: "Menampilkan _MENU_ data",
                zeroRecords: "Data tidak ditemukan",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                infoFiltered: "(disaring dari _MAX_ data)",
                paginate: {
                    previous: '<i class="fa fa-angle-left"></i>',
                    next: "<i class='fa fa-angle-right'></i>",
                }
            },
        });
    </script>
@endsection
