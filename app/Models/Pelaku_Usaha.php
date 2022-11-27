<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelaku_Usaha extends Model
{
    use HasFactory;
    protected $table = 'usaha_layanan';
    protected $primaryKey = 'usaha_id';
    public $timestamps = FALSE;

    protected $fillable = [
        'usaha_id',
        'user_id',
        'usaha_nama',
        'usaha_alamat',
        'usaha_deskripsi',
        'usaha_telp',
        'usaha_sejarah',
        'usaha_tipe',
        'usaha_img',
    ];
}
