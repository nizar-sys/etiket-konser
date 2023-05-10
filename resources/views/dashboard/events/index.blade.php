@extends('layouts.app')
@section('title', 'Data Acara')

@section('title-header', 'Data Acara')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Acara</li>
@endsection

@section('action_btn')
    <a href="{{ route('events.create') }}" class="btn btn-default">Tambah Data</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="card-title">Data Acara</h3>
                            <div class="text-muted">{{ $formatedDatePicked }}</div>
                        </div>
                        <div class="col-6">
                            <form action="" method="get">
                                @csrf
                                <input type="month" name="date_picked" class="form-control" value="{{ date('Y-m', strtotime($datePicked)) }}">

                                <div class="d-flex justify-content-end mt-1">
                                    <a href="{{ route('generate.events', ['date_picked' => date('Y-m', strtotime($datePicked))]) }}" target="_blank" class="btn btn-sm btn-danger mr-2">Print PDF</a>

                                    <a href="{{ route('events.index') }}" class="btn btn-sm btn-secondary mr-2">Muat Ulang</a>

                                    <button type="submit" class="btn btn-sm btn-primary">Urutkan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-flush table-hover" id="data-acara">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Acara</th>
                                    <th>Nama Acara</th>
                                    <th>Harga Tiket</th>
                                    <th>Deskripsi</th>
                                    <th>Poster</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($events as $event)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $event->formated_date }}</td>
                                        <td>{{ $event->nama_acara }}</td>
                                        <td>{{ $event->formated_price }}</td>
                                        <td>{{ str()->words($event->deskripsi_acara, 7, ' ...') }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/images/posters/' . $event->poster) }}"
                                                alt="" width="100px">
                                        </td>
                                        <td class="d-flex jutify-content-center">
                                            <a href="{{ route('events.edit', $event->id) }}"
                                                class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $event->id }}"
                                                action="{{ route('events.destroy', $event->id) }}" class="d-none"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{ $event->id }}')"
                                                class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">Tidak ada data</td>
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

        function deleteForm(id) {
            Swal.fire({
                title: 'Hapus data acara',
                text: "Anda akan menghapus data acara!",
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
