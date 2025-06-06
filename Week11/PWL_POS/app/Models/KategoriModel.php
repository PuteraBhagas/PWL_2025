<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;

    protected $table = 'm_kategori'; // Sesuaikan dengan nama tabel di database
    protected $primaryKey = 'kategori_id'; // Sesuaikan dengan primary key tabel
    public $timestamps = true;

    protected $fillable = ['kategori_kode', 'kategori_nama']; // Sesuaikan dengan kolom di tabel
}