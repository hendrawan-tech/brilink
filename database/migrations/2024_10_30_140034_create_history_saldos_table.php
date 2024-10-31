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
        Schema::create('history_saldos', function (Blueprint $table) {
            $table->id();
            $table->enum('tipe_transaksi', ['Setor Tunai', 'Tarik Tunai']);
            $table->enum('tipe', ['Fee', 'Internal']);
            $table->string('nominal', 10);
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_saldos');
    }
};
