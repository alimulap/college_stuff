{{-- @extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <h1>Dashboard</h1>
@endsection --}}
@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Halo, Apa Kabar!!!</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            Selamat Datang semua, ini adalah halaman utama dari aplikasi ini
        </div>
    </div>
@endsection

{{--
@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
{{--
@endsection
@section('js')
@endsection
--}}
