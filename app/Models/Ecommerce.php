<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecommerce extends Model
{
    use HasFactory;
    protected $table = 'ecommerce';
    protected $primaryKey = 'ecommerce_id';
    public $timestamps = FALSE;

    protected $fillable = [
        'ecommerce_id',
        'ecommerce_name',
    ];
}
