<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Msaid extends Model
{
    use HasFactory;

    protected $table = 'msaid';

    protected $fillable = [
        'no_transaksi_keluar_msaid', 'id_barang', 'tgl_keluar_msaid', 'qty_keluar_msaid', 'total_keluar_msaid',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
