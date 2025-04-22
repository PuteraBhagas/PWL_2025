@extends('layouts.template')

@section('content')
<div class="container">
    <h3>Detail Transaksi Penjualan</h3>
    
    <div class="card mt-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tr>
                            <th width="30%">Nomor Nota</th>
                            <td>: {{ $penjualan->nomor_nota }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>: {{ date('d-m-Y', strtotime($penjualan->tanggal)) }}</td>
                        </tr>
                        <tr>
                            <th>Status Bayar</th>
                            <td>: {{ $penjualan->status_bayar }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tr>
                            <th width="30%">Total Harga</th>
                            <td>: {{ number_format($penjualan->total_harga, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>: {{ $penjualan->keterangan ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <h5 class="mt-4">Detail Barang</h5>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penjualan->detailPenjualan as $key => $detail)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $detail->barang->nama_barang }}</td>
                        <td>{{ $detail->jumlah }} {{ $detail->barang->satuan }}</td>
                        <td>Rp {{ number_format($detail->harga, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-end">Total:</th>
                        <th>Rp {{ number_format($penjualan->total_harga, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <a href="{{ route('penjualan.index') }}" class="btn btn-secondary me-md-2">Kembali</a>
                <a href="{{ route('penjualan.edit', $penjualan->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection