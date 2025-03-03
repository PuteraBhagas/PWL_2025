<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void //Mendefinisikan fungsi up() yang akan dijalankan saat migrasi dilakukan.
    {
        Schema::create('items', function (Blueprint $table) { //Fungsi anonim function (Blueprint $table) digunakan untuk mendefinisikan kolom-kolom dalam tabel tersebut.
            $table->id(); //Membuat kolom id sebagai primary key
            $table->string('name'); //Menambahkan kolom name bertipe VARCHAR
            $table->text('description'); //Menambahkan kolom description bertipe TEXT
            $table->timestamps(); //menyimpan waktu saat data dibuat
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
