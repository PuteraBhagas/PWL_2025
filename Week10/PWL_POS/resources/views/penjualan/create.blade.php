@extends('layouts.template')

@section('content')
<div class="container">
    <h3>Tambah Transaksi Penjualan</h3>
    
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    <div class="card mt-3">
        <div class="card-body">
            <form action="{{ route('penjualan.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nomor_nota" class="form-label">Nomor Nota</label>
                            <input type="text" class="form-control @error('nomor_nota') is-invalid @enderror" id="nomor_nota" name="nomor_nota" value="{{ $nomorNota }}" readonly>
                            @error('nomor_nota')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}">
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="card border">
                        <div class="card-header bg-light">
                            <h5>Detail Barang</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-5">
                                    <select id="select_barang" class="form-select">
                                        <option value="">-- Pilih Barang --</option>
                                        @foreach($barang as $item)
                                            <option value="{{ $item->id }}" data-stok="{{ $item->jumlah }}">
                                                {{ $item->nama_barang }} (Stok: {{ $item->jumlah }} {{ $item->satuan }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" id="input_jumlah" class="form-control" placeholder="Jumlah" min="1">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" id="input_harga" class="form-control" placeholder="Harga" readonly>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" id="btn_add_item" class="btn btn-primary">
                                        Tambah Item
                                    </button>
                                </div>
                            </div>

                            <table class="table table-bordered" id="detail_table">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Subtotal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Items will be added dynamically -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3" class="text-end">Total:</th>
                                        <th id="total_amount">Rp 0</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="status_bayar" class="form-label">Status Pembayaran</label>
                            <select class="form-select @error('status_bayar') is-invalid @enderror" id="status_bayar" name="status_bayar">
                                <option value="Lunas" {{ old('status_bayar') == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                                <option value="Belum Lunas" {{ old('status_bayar') == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas</option>
                            </select>
                            @error('status_bayar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ old('keterangan') }}</textarea>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="total_harga" id="total_harga" value="0">

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('penjualan.index') }}" class="btn btn-secondary me-md-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        let selectedBarang = {};
        let totalAmount = 0;
        let itemCount = 0;

        // When a product is selected
        $('#select_barang').change(function() {
            const barangId = $(this).val();
            if (!barangId) return;

            // Fetch product details
            $.ajax({
                url: '/penjualan/get-barang-info/' + barangId,
                type: 'GET',
                success: function(response) {
                    selectedBarang = response;
                    $('#input_harga').val(response.harga_jual || 0);
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan saat mengambil data barang');
                }
            });
        });

        // Add item to the table
        $('#btn_add_item').click(function() {
            const barangId = $('#select_barang').val();
            const barangText = $('#select_barang option:selected').text().split(' (')[0];
            const jumlah = parseInt($('#input_jumlah').val());
            const maxStok = parseInt($('#select_barang option:selected').data('stok'));
            const harga = parseFloat($('#input_harga').val());

            // Validation
            if (!barangId || !jumlah || !harga) {
                alert('Semua field harus diisi!');
                return;
            }

            if (jumlah <= 0) {
                alert('Jumlah harus lebih dari 0!');
                return;
            }

            if (jumlah > maxStok) {
                alert('Jumlah melebihi stok tersedia!');
                return;
            }

            const subtotal = jumlah * harga;
            itemCount++;

            // Add row to table
            const newRow = `
                <tr id="item_${itemCount}">
                    <td>
                        ${barangText}
                        <input type="hidden" name="barang_id[]" value="${barangId}">
                    </td>
                    <td>
                        ${jumlah}
                        <input type="hidden" name="jumlah[]" value="${jumlah}">
                    </td>
                    <td>
                        ${formatRupiah(harga)}
                        <input type="hidden" name="harga[]" value="${harga}">
                    </td>
                    <td>
                        ${formatRupiah(subtotal)}
                        <input type="hidden" name="subtotal[]" value="${subtotal}">
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="${itemCount}" data-subtotal="${subtotal}">
                            Hapus
                        </button>
                    </td>
                </tr>
            `;
            $('#detail_table tbody').append(newRow);

            // Update total
            totalAmount += subtotal;
            updateTotal();

            // Reset input fields
            $('#select_barang').val('');
            $('#input_jumlah').val('');
            $('#input_harga').val('');
            selectedBarang = {};
        });

        // Delete item from the table
        $(document).on('click', '.btn-delete', function() {
            const id = $(this).data('id');
            const subtotal = $(this).data('subtotal');
            
            $(`#item_${id}`).remove();
            
            // Update total
            totalAmount -= subtotal;
            updateTotal();
        });

        // Helper function to update total
        function updateTotal() {
            $('#total_amount').text(formatRupiah(totalAmount));
            $('#total_harga').val(totalAmount);
        }

        // Helper function to format currency
        function formatRupiah(amount) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(amount);
        }
    });
</script>
@endsection