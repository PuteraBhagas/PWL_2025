@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <button onclick="modalAction('{{ url('/stok/import') }}')" class="btn btn-info">Import Stok</button>
                <a href="{{ url('/stok/export_excel') }}" class="btn btn-primary"><i class="fa fa-file-excel"></i> Export Stok</a>
                <a href="{{ url('/stok/export_pdf') }}" class="btn btn-warning" target="_blank"><i class="fa fa-file-pdf"></i> Export Stok</a>
                <button onclick="modalAction('{{ url('/stok/create_ajax') }}')" class="btn btn-success">Tambah Data</button>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-striped table-hover table-sm" id="table_stok">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Supplier</th>
                        <th>Tanggal</th>
                        <th>User Pembuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static"
        data-keyboard="false" data-width="75%" aria-hidden="true">
    </div>
@endsection

@push('css')
@endpush

@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function () {
                $('#myModal').modal('show');
            });
        }

        var tableStok;
        $(document).ready(function () {
            tableStok = $('#table_stok').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/stok/list') }}",
                    type: "POST",
                    dataType: "json",
                    data: function (d) {
                        d.level_id = $('#level_id').val();
                    }
                },
                columns: [
                    {
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "barang_nama",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "stok_jumlah",
                        className: "text-center",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "supplier_nama",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "stok_tanggal",
                        className: "text-center",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "user_nama",
                        className: "",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "aksi",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endpush