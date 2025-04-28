<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanSeeder extends Seeder
{
    public function run()
    {
        $penjualan = [];
        for ($i = 1; $i <= 10; $i++) {
            $penjualan[] = [
                'user_id' => 1,
                'pembeli' => 'Pelanggan ' . $i,
                'penjualan_kode' => 'ORD' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'penjualan_tanggal' => Carbon::now()
            ];
        }

        DB::table('t_penjualan')->insert($penjualan);
    }
}
