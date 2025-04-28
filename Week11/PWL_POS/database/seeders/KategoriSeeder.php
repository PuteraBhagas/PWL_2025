<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $kategori = [
            ['kategori_kode' => 'FOOD', 'kategori_nama' => 'Makanan'],
            ['kategori_kode' => 'BEV', 'kategori_nama' => 'Minuman'],
            ['kategori_kode' => 'BOOK', 'kategori_nama' => 'Buku'],
            ['kategori_kode' => 'SPORT', 'kategori_nama' => 'Olahraga'],
            ['kategori_kode' => 'FURN', 'kategori_nama' => 'Furniture']
        ];

        DB::table('m_kategori')->insert($kategori);
    }
}