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
                        <input
                            type="text"
                            class="form-control @error('levelID') is-invalid @enderror"
                            name="levelID"
                            placeholder="Masukkan Level Id">
                            @error('levelID')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        <label>Level Kode</label>
                        <input
                            type="text"
                            class="form-control @error('levelKode') is-invalid @enderror"
                            name="levelKode"
                            placeholder="Masukkan Level Kode (contoh: ADM)">
                            @error('levelKode')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        <label>Level Nama</label>
                        <input
                            type="text"
                            class="form-control @error('levelNama') is-invalid @enderror"
                            name="levelNama"
                            placeholder="Masukkan Level Nama">
                            @error('levelNama')
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
