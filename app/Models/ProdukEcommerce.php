<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukEcommerce extends Model
{
    use HasFactory;
    protected $table = 'produk_ecommerce';
    protected $primaryKey = 'item_id';
    public $timestamps = FALSE;

    protected $fillable = [
        'item_id',
        'ecommerce_id',
        'produk_ecommerce_link1',
        'produk_ecommerce_link2',
        'produk_ecommerce_link3',
    ];
}
