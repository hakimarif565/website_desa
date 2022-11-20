<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelaku_Usaha extends Model
{
    use HasFactory;
    protected $table = 'pelaku_usaha';
    protected $primaryKey = 'usaha_id';
    public $timestamps = FALSE;

    protected $fillable = [
        'usaha_id',
        'usaha_nama',
        'usaha_alamat',
        'ecommerce_name',
        'ecommerce_name',
        'ecommerce_name',
    ];
}
