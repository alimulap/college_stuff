@extends('layouts.app')

@section('subtitle', 'User')
@section('content_header_title', 'User')
@section('content_header_subtitle', 'Create')

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Buat user baru</h3>
            </div>

            <form action="/user/tambah/simpan" method="post">

                {{ csrf_field() }}

                <div class="card-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input
                            type="text"
                            class="form-control" @error('username') is-invalid @enderror"
                            name="username"
                            placeholder="Masukkan Username">
                            @error('username')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        <label>Nama</label>
                        <input
                            type="text"
                            class="form-control @error('nama') is-invalid @enderror"
                            name="nama"
                            placeholder="Masukkan Nama">
                            @error('nama')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        <label>Password</label>
                        <input
                            type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password"
                            placeholder="Masukkan Password">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        <label>ID Level Pengguna</label>
                        <input
                            type="text"
                            class="form-control @error('level_id') is-invalid @enderror"
                            name="level_id"
                            placeholder="Masukkan ID Level Pengguna">
                            @error('level_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Simpan" class="btn btn-success">
                </div>

            </form>
        </div>
    </div>
@endsection
