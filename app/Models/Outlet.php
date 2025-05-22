<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $table = 'outlets';

    protected $fillable = [
        'nama', 'alamat', 
    ];


    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
