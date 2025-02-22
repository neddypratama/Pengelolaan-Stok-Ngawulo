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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id('id_barang');
            $table->char('kode_barang');
            $table->string('nama_barang');
            $table->integer('stok_barang');
            $table->unsignedBigInteger('id_satuan')->index();
            $table->unsignedBigInteger('id_jenis')->index();
            $table->timestamps();

            $table->foreign('id_jenis')->references('id_jenis')->on('jenis_barangs');
            $table->foreign('id_satuan')->references('id_satuan')->on('satuans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
