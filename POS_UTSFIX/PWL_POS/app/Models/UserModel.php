<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
    use HasFactory;

     protected $table = 'm_user'; // Sesuaikan dengan tabel di database
     protected $primaryKey = 'user_id'; // Sesuaikan dengan primary key di database
     protected $fillable=['level_id','username','nama','password', 'created_at', 'updated_at', 'profile_picture'];
     protected $hidden = ['password'];
     protected $casts = ['password' => 'hashed'];
 
    /**
     * Relasi ke LevelModel.
     */
    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
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