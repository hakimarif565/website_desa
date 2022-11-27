<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk_Layanan extends Model
{
    use HasFactory;
    protected $table = 'produk_layanan';
    protected $primaryKey = 'item_id';
    public $timestamps = FALSE;

    protected $fillable = [
        'item_id',
        'usaha_id',
        'item_name',
        'item_deskripsi',
        'item_harga',
        'item_dll',
    ];
}
