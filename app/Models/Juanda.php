<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juanda extends Model
{
    use HasFactory;

    protected $table = 'juanda';

    protected $fillable = [
        'no_transaksi_keluar_juanda', 'id_barang', 'tgl_keluar_juanda', 'qty_keluar_juanda', 'total_keluar_juanda',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
