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
                        <input type="text" class="form-control" name="username" placeholder="Masukkan Username"><br>
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama"><br>
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan Password"><br>
                        <label>ID Level Pengguna</label>
                        <input type="text" class="form-control" name="level_id" placeholder="Masukkan ID Level Pengguna"><br>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Simpan" class="btn btn-success">
                </div>

            </form>
        </div>
    </div>
@endsection
