@extends('layouts.app')

@section('subtitle', 'Level')
@section('content_header_title', 'Level')
@section('content_header_subtitle', 'Create')

@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Buat user baru</h3>
            </div>

            <form action="/level" method="post">

                {{ csrf_field() }}

                <div class="card-body">
                    <div class="form-group">
                        <label>Level Id</label>
                        <input type="text" class="form-control" name="levelID" placeholder="Masukkan Level Id"><br>
                        <label>Level Kode</label>
                        <input type="text" class="form-control" name="levelKode" placeholder="Masukkan Level Kode (contoh: ADM)"><br>
                        <label>Level Nama</label>
                        <input type="text" class="form-control" name="levelNama" placeholder="Masukkan Level Nama"><br>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Simpan" class="btn btn-success">
                </div>

            </form>
        </div>
    </div>
@endsection
