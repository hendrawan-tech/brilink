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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->enum('tipe', ['Cek Saldo', 'Setor Tunai', 'Tarik Tunai', 'Tarik Tunai Nasabah']);
            $table->date('tanggal');
            $table->string('admin_bank', 5);
            $table->string('admin_agent', 5);
            $table->string('keterangan');
            $table->string('nominal', 10);
            $table->enum('status', ['Lunas', 'Belum Lunas']);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
