@extends('layouts.frontend')

@section('title', 'Events')

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/event_list.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="bg-white rounded d-flex align-items-center justify-content-between" id="header">
            <nav class="navbar navbar-expand-lg navbar-light pl-lg-0 pl-auto"> <button class="navbar-toggler" type="button"
                    data-toggle="collapse" data-target="#mynav" aria-controls="mynav" aria-expanded="false"
                    aria-label="Toggle navigation" id="icon"> <span
                        class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse ml-2" id="mynav">
                    <ul class="navbar-nav d-lg-flex align-items-lg-center">
                        <li class="nav-item active">
                            <form action="" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Cari acara">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="ml-auto mt-3 mr-2">
                {{ $events->links() }}
            </div>
        </div>
        <div id="content" class="my-5">
            <div id="products">
                <div class="row mx-0">
                    @forelse ($events as $event)
                        <a class="col-lg-4 col-md-6 mt-2 text-dark" href="{{ route('event.detail', ['event' => str()->slug($event->nama_acara)]) }}">
                            <div class="card d-flex flex-column align-items-center">
                                <div class="product-name">{{ $event->nama_acara }}</div>
                                <div class="card-img"> <img
                                        src="{{ asset('/uploads/images/posters/' . $event->poster) }}"
                                        alt=""> </div>
                                <div class="card-body mt-3">
                                    <div class="text-muted text-center mt-auto">{{ $event->formated_date }}</div>
                                    {{ str()->words($event->deskripsi_acara, 5, ' ...')  }}
                                    <div class="d-flex align-items-center price">
                                        <div class="font-weight-bold">{{ $event->formated_price }}</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-danger text-center" role="alert">
                                Tidak ada acara yang tersedia
                                <br>
                                <a href="{{ url('/', []) }}" class="btn btn-primary mt-3">Muat Ulang</a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#sort-event').change(function() {
                var sort = $(this).val();
                var url = window.location.href;
                var newUrl = url.split('?')[0] + '?sort=' + sort;
                window.location.href = newUrl;
            });
        });
    </script>
@endsection
