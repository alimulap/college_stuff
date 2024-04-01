<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,
                'kategori_nama' => 'Food & Beverage',
                'kategori_kode' => 'FNB'
            ],
            [
                'kategori_id' => 2,
                'kategori_nama' => 'Beauty & Health',
                'kategori_kode' => 'BTH'
            ],
            [
                'kategori_id' => 3,
                'kategori_nama' => 'Home Care',
                'kategori_kode' => 'HMC'
            ],
            [
                'kategori_id' => 4,
                'kategori_nama' => 'Baby & Kids',
                'kategori_kode' => 'BKB'
            ],
            [
                'kategori_id' => 5,
                'kategori_nama' => 'Electronics',
                'kategori_kode' => 'ELC'
            ],
        ];
        DB::table('m_kategori')->insert($data);
    }
}
