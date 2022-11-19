<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;
    protected $table = 'desa';
    protected $primaryKey = 'desa_id';
    public $timestamps = FALSE;

    protected $fillable = [
        'desa_id',
        'desa_sejarah',
        'desa_visi',
        'desa_misi',
        'desa_nama',
        'desa_alamat',
        'desa_telp',
    ];
}
