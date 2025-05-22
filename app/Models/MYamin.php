<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MYamin extends Model
{
    use HasFactory;

    protected $table = 'myamin';

    protected $fillable = [
        'no_transaksi_keluar_myamin', 'id_barang', 'tgl_keluar_myamin', 'qty_keluar_myamin', 'total_keluar_myamin',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
