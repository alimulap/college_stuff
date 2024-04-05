@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('barang/create') }}">Tambah</a>
            </div>
        </div>
        <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <table class="table table-bordered table-striped table-hover table-sm" id="table_barang">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Barang Id</th>
                    <th>Kategori Id</th>
                    <th>Nama Barang</th>
                    <th>Kode Barang</th>
                    <th>Harga jual</th>
                    <th>Harga beli</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            var dataUser = $('#table_barang').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('barang/list') }}",
                    "dataType": "json",
                    "type": "POST",
                },
                columns: [
                    {
                        data: "DT_RowIndex", // nomor urut dari laravel datatable addIndexColumn()
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },{
                        data: "barang_id",
                        className: "",
                        orderable: true,
                        searchable: true
                    },{
                        data: "kategori.kategori_nama",
                        className: "",
                        orderable: false,
                        searchable: false
                    },{
                        data: "barang_nama",
                        className: "",
                        orderable: true,
                        searchable: true
                    },{
                        data: "barang_kode",
                        className: "",
                        orderable: true,
                        searchable: true
                    },{
                        data: "harga_jual",
                        className: "",
                        orderable: true,
                        searchable: true
                    },{
                        data: "harga_beli",
                        className: "",
                        orderable: true,
                        searchable: true
                    },{
                        data: "aksi",
                        className: "",
                        orderable: false,
                        searchable:false
                    }
                ]
            });
        });
    </script>
@endpush
