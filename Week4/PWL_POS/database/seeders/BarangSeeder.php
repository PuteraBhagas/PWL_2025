<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run()
    {
        $barang = [
            ['kategori_id' => 1, 'barang_kode' => 'A001', 'barang_nama' => 'Roti Gandum', 'harga_beli' => 15000, 'harga_jual' => 20000],
            ['kategori_id' => 1, 'barang_kode' => 'A002', 'barang_nama' => 'Nasi Goreng Instan', 'harga_beli' => 20000, 'harga_jual' => 25000],
            ['kategori_id' => 2, 'barang_kode' => 'B001', 'barang_nama' => 'Kopi Arabika', 'harga_beli' => 50000, 'harga_jual' => 75000],
            ['kategori_id' => 2, 'barang_kode' => 'B002', 'barang_nama' => 'Teh Hijau', 'harga_beli' => 40000, 'harga_jual' => 50000],
            ['kategori_id' => 3, 'barang_kode' => 'C001', 'barang_nama' => 'Novel Fiksi', 'harga_beli' => 75000, 'harga_jual' => 100000],
            ['kategori_id' => 3, 'barang_kode' => 'C002', 'barang_nama' => 'Buku Sejarah', 'harga_beli' => 55000, 'harga_jual' => 150000],
            ['kategori_id' => 4, 'barang_kode' => 'D001', 'barang_nama' => 'Bola Basket', 'harga_beli' => 200000, 'harga_jual' => 250000],
            ['kategori_id' => 4, 'barang_kode' => 'D002', 'barang_nama' => 'Sepatu Lari', 'harga_beli' => 500000, 'harga_jual' => 650000],
            ['kategori_id' => 5, 'barang_kode' => 'E001', 'barang_nama' => 'Meja Kayu', 'harga_beli' => 700000, 'harga_jual' => 850000],
            ['kategori_id' => 5, 'barang_kode' => 'E002', 'barang_nama' => 'Kursi Kayu', 'harga_beli' => 750000, 'harga_jual' => 900000]
        ];

        DB::table('m_barang')->insert($barang);
    }
}

