<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Casts\Attribute;

class UserModel extends Authenticatable implements JWTSubject
{

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
     protected $table = 'm_user'; // Sesuaikan dengan tabel di database
     protected $primaryKey = 'user_id'; // Sesuaikan dengan primary key di database
     protected $fillable=['level_id','username','nama','password', 'image',];
    
    /**
     * Relasi ke LevelModel.
     */
    public function level() 
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    public function image(): Attribute{
        return Attribute::make(
            get: fn ($image)=> url('/storage/posts/' . $image),
        );
    }

    public function getRoleName(): string{
        return $this->level->level_nama;
    }

    public function hasRole($role): bool{
        return $this->level->level_kode == $role;
    }

    public function getRole() {
        return $this->level->level_kode;
    }
}