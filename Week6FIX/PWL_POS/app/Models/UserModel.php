<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user'; // Sesuaikan dengan tabel di database
    protected $primaryKey = 'user_id'; // Sesuaikan dengan primary key di database
    public $timestamps = true; // timestamps aktif karena ada di migration

    protected $fillable = ['username', 'nama', 'password', 'level_id'];

    /**
     * Relasi ke LevelModel.
     */
    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
}
