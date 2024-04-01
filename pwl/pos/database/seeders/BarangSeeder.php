<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 1, // kategori food & beverage
                'barang_nama' => 'Indomie Goreng',
                'barang_kode' => 'IDM-GRG',
                'harga_beli' => 2000,
                'harga_jual' => 2500,
                //'barang_stok' => 300
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 1,
                'barang_nama' => 'Mie Sedap Goreng',
                'barang_kode' => 'MSG-GRG',
                'harga_beli' => 2000,
                'harga_jual' => 2500,
                //'barang_stok' => 300
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 2, // kategori beauty & health
                'barang_nama' => 'Shampo Sunsilk',
                'barang_kode' => 'SNSLK',
                'harga_beli' => 5000,
                'harga_jual' => 7500,
                //'barang_stok' => 200
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_nama' => 'Sabun Lifebuoy',
                'barang_kode' => 'LFBY',
                'harga_beli' => 4000,
                'harga_jual' => 5500,
                //'barang_stok' => 100

            ],
            [
                'barang_id' => 5,
                'kategori_id' => 3, // kategori home care
                'barang_nama' => 'Kipas Angin Cosmos',
                'barang_kode' => 'KPA-CSM',
                'harga_beli' => 200000,
                'harga_jual' => 250000,
                //'barang_stok' => 20
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 3,
                'barang_nama' => 'Panci Oxone',
                'barang_kode' => 'PNC-OXN',
                'harga_beli' => 100000,
                'harga_jual' => 150000,
                //'barang_stok' => 50
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 4, // kategori baby & kids
                'barang_nama' => 'Pampers Baby Dry',
                'barang_kode' => 'PMP-BDR',
                'harga_beli' => 40000,
                'harga_jual' => 50000,
                //'barang_stok' => 100
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 4,
                'barang_nama' => 'Baju Anak',
                'barang_kode' => 'BJU-ANK',
                'harga_beli' => 25000,
                'harga_jual' => 35000,
                //'barang_stok' => 45
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 5, // kategori electronics
                'barang_nama' => 'Charger HP',
                'barang_kode' => 'CHR-HP',
                'harga_beli' => 20000,
                'harga_jual' => 25000,
                //'barang_stok' => 60
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 5,
                'barang_nama' => 'Powerbank',
                'barang_kode' => 'PWBK',
                'harga_beli' => 100000,
                'harga_jual' => 150000,
                //'barang_stok' => 30
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
}
