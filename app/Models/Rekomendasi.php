<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekomendasi extends Model
{
    use HasFactory;
    protected $table = 'rekomendasi';
    protected $primaryKey = 'rekomendasi_id';
    public $timestamps = FALSE;

    protected $fillable = [
        'rekomendasi_id',
        'user_id',
        'rekomendasi_name',
        'rekomendasi_subname',
        'rekomendasi_deskripsi',
        'rekomendasi_img',
    ];
}
