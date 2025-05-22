<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cendana extends Model
{
    use HasFactory;

    protected $table = 'cendana';

    protected $fillable = [
        'no_transaksi_keluar_cendana', 'id_barang', 'tgl_keluar_cendana', 'qty_keluar_cendana', 'total_keluar_cendana',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
