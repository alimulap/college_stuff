<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_id' => 1,
                'user_id' => 3,
                'pembeli' => 'Budi',
                'penjualan_kode' => 'INV/2024/01/01',
                'penjualan_tanggal' => '2024-01-01',
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 3,
                'pembeli' => 'Ani',
                'penjualan_kode' => 'INV/2024/01/02',
                'penjualan_tanggal' => '2024-01-02',
            ],
            [
                'penjualan_id' => 3,
                'user_id' => 3,
                'pembeli' => 'Joko',
                'penjualan_kode' => 'INV/2024/01/03',
                'penjualan_tanggal' => '2024-01-03',
            ],
            [
                'penjualan_id' => 4,
                'user_id' => 3,
                'pembeli' => 'Rina',
                'penjualan_kode' => 'INV/2024/01/04',
                'penjualan_tanggal' => '2024-01-04',
            ],
            [
                'penjualan_id' => 5,
                'user_id' => 3,
                'pembeli' => 'Dodi',
                'penjualan_kode' => 'INV/2024/01/05',
                'penjualan_tanggal' => '2024-01-05',
            ],
            [
                'penjualan_id' => 6,
                'user_id' => 3,
                'pembeli' => 'Susi',
                'penjualan_kode' => 'INV/2024/01/06',
                'penjualan_tanggal' => '2024-01-06',
            ],
            [
                'penjualan_id' => 7,
                'user_id' => 3,
                'pembeli' => 'Rudi',
                'penjualan_kode' => 'INV/2024/01/07',
                'penjualan_tanggal' => '2024-01-07',
            ],
            [
                'penjualan_id' => 8,
                'user_id' => 3,
                'pembeli' => 'Dewi',
                'penjualan_kode' => 'INV/2024/01/08',
                'penjualan_tanggal' => '2024-01-08',
            ],
            [
                'penjualan_id' => 9,
                'user_id' => 3,
                'pembeli' => 'Roni',
                'penjualan_kode' => 'INV/2024/01/09',
                'penjualan_tanggal' => '2024-01-09',
            ],
            [
                'penjualan_id' => 10,
                'user_id' => 3,
                'pembeli' => 'Rina',
                'penjualan_kode' => 'INV/2024/01/10',
                'penjualan_tanggal' => '2024-01-10',
            ],
        ];
        DB::table('t_penjualan')->insert($data);
    }
}
