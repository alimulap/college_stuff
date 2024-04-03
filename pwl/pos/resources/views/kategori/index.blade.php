@extends('layouts.app')

@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')

@section('content')
    <div class="container">
        <button type="button" class="btn btn-secondary mb-3" onclick="window.location='/kategori/create'">
            Tambah
        </button>

        <div class="card">
            <div class="card-header">
                Manage Kategori
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
