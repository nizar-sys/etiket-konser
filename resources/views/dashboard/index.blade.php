@extends('layouts.app')
@section('title', 'Dashboard')
@php
    $auth = Auth::user();
@endphp

@section('breadcrumb')
<li class="breadcrumb-item active"><a
href="{{ route('home') }}">Dashboard</a></li>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <a class="col-lg-4 col-md-6 col-12 text-dark" href="{{ route('users.index', []) }}">
                    <div class="card  mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Staff</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $countData['staff'] }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="fas fa-users text-lg opacity-10"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="col-lg-4 col-md-6 col-12 text-dark" href="{{ route('events.index', []) }}">
                    <div class="card  mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Acara</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $countData['event'] }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="col-lg-4 col-md-6 col-12 text-dark" href="{{ route('orders.index', []) }}">
                    <div class="card  mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Pesanan</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $countData['order'] }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card shadow">
                        <div class="card-header bg-transparent border-0 text-dark">
                            <h2 class="card-title h3">Tiket Acara Terbanyak Dijual</h2>
                            <div class="table-responsive">
                                <table class="table table-flush table-hover" id="table-most-popular">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Acara</th>
                                            <th>Jumlah Tiket Terjual</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mostSoldTicketEvent as $order)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $order->event->nama_acara }}</td>
                                                <td>{{ $order->total }} Tiket</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var dataTable = $('#table-most-popular').DataTable({
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
            dom: 'Bflrtip',
            buttons: [{
                title: 'Data Tiket Terbanyak Dijual',
                text: '<i class="fas fa-file-pdf"></i> PDF',
                className: 'btn btn-sm btn-danger',
                action: function() {
                    window.open("{{ route('generate.most-popular-event') }}", '_blank')
                }
            }, ],
        });
    </script>
@endsection