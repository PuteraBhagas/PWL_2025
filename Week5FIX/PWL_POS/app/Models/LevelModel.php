<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LevelModel extends Model
{
    use HasFactory;

    protected $table = 'm_level'; // Nama tabel sesuai database
    protected $primaryKey = 'level_id'; // Sesuaikan dengan primary key di database
    public $timestamps = false; // Nonaktifkan timestamps karena tidak digunakan

    protected $fillable = ['level_kode', 'level_name'];

    /**
     * Relasi ke UserModel (satu level memiliki banyak user).
     */
    public function users(): HasMany
    {
        return $this->hasMany(UserModel::class, 'level_id', 'level_id');
    }
}
