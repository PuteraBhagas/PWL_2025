 @extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($supplier)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr>
                        <th>ID</th>
                        <td>{{ $supplier->supplier_id }}</td>
                    </tr>
                    <tr>
                        <th>Supplier_kode</th>
                        <td>{{ $supplier->supplier_kode }}</td>
                    </tr>
                    <tr>
                        <th>Supplier_nama</th>
                        <td>{{ $supplier->supplier_nama }}</td>
                    </tr>
                </table>
            @endempty
            <a href="{{ url('supplier') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection
@push('css')
@endpush

@push('js')
@endpush