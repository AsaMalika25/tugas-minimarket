<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up ini dijalankan apabila ingin membuat struktur dri tabel
    public function up(): void
    {
        // jadi $table ini adalah objek baru dari Blueprint yang digunakan untuk membuat struktur tabel
        Schema::create('perusahaan', function (Blueprint $table) {
            #$table->id();
            #$table->timestamps();
            $table->integer('id_perusahaan')->autoIncrement();
            $table->string('nama_perusahaan',100)->nullable(false);
            $table->string('npwp',30)->nullable(false);
            $table->text('alamat')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    // sedangkan function down dilakukan apabila kita ingin menghapus tabel
    public function down(): void
    {
        Schema::dropIfExists('perusahaan');
    }
};
