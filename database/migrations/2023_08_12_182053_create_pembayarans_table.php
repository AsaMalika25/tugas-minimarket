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
        Schema::create('pembayaran', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->integer('id_pembayaran',true);
            $table->integer('id_jenis_pembayaran',false)->index('idJenisPembayaran');
            $table->integer('id_transaksi',false)->index('idTransaksi');
            $table->integer('total_tagihan',false)->nullable(false);
            $table->integer('total_bayar',false)->nullable(false);
            // Foreign Key
            $table->foreign('id_jenis_pembayaran')
                    ->references('id_jenis_pembayaran')->on('jenis_pembayaran')
                    ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_transaksi')
                    ->references('id_transaksi')->on('transaksi')
                    ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
