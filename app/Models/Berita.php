<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $primaryKey = 'berita_id';
    public $timestamps = FALSE;

    protected $fillable = [
        'berita_id',
        'user_id',
        'berita_name',
        'berita_deskripsi',
        'berita_lokasi',
        'berita_jam',
        'berita_dll',
    ];
}
