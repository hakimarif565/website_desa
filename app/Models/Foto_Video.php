<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto_Video extends Model
{
    use HasFactory;
    protected $table = 'foto_video';
    protected $primaryKey = 'dokumentasi_id';
    public $timestamps = FALSE;

    protected $fillable = [
        'dokumentasi_id',
        'desa_id',
        'berita_id',
        'foto',
        'video_link',
    ];
}
