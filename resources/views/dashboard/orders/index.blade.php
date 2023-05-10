@extends('layouts.app')
@section('title', 'Data Pemesanan')

@section('title-header', 'Data Pemesanan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Pemesanan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Data Pemesanan</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover" id="data-order">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Acara</th>
                                    <th>Nama Pemesan</th>
                                    <th>Email</th>
                                    <th>No HP</th>
                                    <th>Jumlah Tiket</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->event->nama_acara }}</td>
                                        <td>{{ $order->nama_pemesan }}</td>
                                        <td>{{ $order->email_pemesan }}</td>
                                        <td>{{ $order->no_hp_pemesan }}</td>
                                        <td>{{ $order->jumlah_tiket }}</td>
                                        <td>{{ $order->total_harga }}</td>
                                        <td class="d-flex jutify-content-center">
                                            <form id="delete-form-{{ $order->id }}" action="{{ route('orders.destroy', $order->id) }}" class="d-none" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{$order->id}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var datatable = $('#data-order').DataTable({
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

        function deleteForm(id){
            Swal.fire({
                title: 'Hapus data',
                text: "Anda akan menghapus data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $(`#delete-form-${id}`).submit()
                }
            })
        }
    </script>
@endsection
