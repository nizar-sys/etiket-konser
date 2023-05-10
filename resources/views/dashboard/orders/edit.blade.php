@extends('layouts.app')
@section('title', 'Ubah Data Staff')

@section('title-header', 'Ubah Data Staff')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Data Staff</a></li>
    <li class="breadcrumb-item active">Ubah Data Staff</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h5 class="mb-0">Formulir Ubah Data Staff</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                        placeholder="Nama Staff" value="{{ $user->name }}" name="name">

                                    @error('name')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        id="email" placeholder="Email Staff" value="{{ $user->email }}"
                                        name="email">

                                    @error('email')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="role">Role</label>
                                    <select class="form-control @error('role') is-invalid @enderror" id="role" name="role">
                                        @php
                                            $roles = ['admin', 'staff'];
                                        @endphp
                                        <option value="" selected>---Role---</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role }}" @if ($user->role == $role) selected @endif>
                                                {{ $role }}</option>
                                        @endforeach
                                    </select>

                                    @error('role')
                                        <div class="d-block invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
