<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'judul',
        'penulis',
        'jml_hal'
    ];

    protected $table = 'buku';

    protected $increment = false;
    protected $keyType = 'string';
}
