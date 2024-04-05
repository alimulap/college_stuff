<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;

    protected $table = 'm_product';
    protected $primaryKey = 'product_id';
    protected $fillable = ['product_nama', 'product_kode', 'harga_beli', 'harga_jual', 'kategori_id'];
}
