<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'tbl_barang_masuk';

    protected $fillable = [
        'no_transaksi_masuk', 'id_barang', 'tgl_masuk', 'qty_masuk', 'total_masuk',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
