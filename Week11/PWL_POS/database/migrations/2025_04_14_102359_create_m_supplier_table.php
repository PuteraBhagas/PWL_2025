<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    // Hapus tabel jika sudah ada
    Schema::dropIfExists('m_supplier');
    
    // Kemudian buat tabel baru
    Schema::create('m_supplier', function (Blueprint $table) {
        $table->id('supplier_id');
        $table->string('supplier_code', 10);
        $table->string('supplier_name', 100);
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_supplier');
    }
};