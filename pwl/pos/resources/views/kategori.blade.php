@extends('layout.app')

@section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')

@section('content_body')
    <div class="container">
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

@section('css')

@endsection

@section('js')
    {{ $dataTable->scripts() }}
@endsection
