<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $timestamps = FALSE;

    protected $fillable = [
        'user_id',
        'desa_id',
        'user_name',
        'username',
        'email',
        'password',
    ];

    protected $hidden = [
        'user_password',
        'remember_token',
    ];

    #One2Many
    public function AssignedToBerita()
    {
        return $this->hasMany(Berita::class);
    }
    public function assignedToUsaha()
    {
        return $this->hasMany(Pelaku_Usaha::class);
    }
    #One2Many Reverse
    public function hasDesa()
    {
        return $this->belongsTo(Desa::class);
    }

    protected $dateFormat = 'Y-m-d H:i:s';
    const CREATED_AT = 'user_created';
    const UPDATED_AT = 'user_updated';

}
