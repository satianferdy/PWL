<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa_matakuliah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id')->nullable(); //menyimpan id dari tabel mahasiswa
            $table->unsignedBigInteger('matakuliah_id')->nullable(); //menyimpan id dari tabel matakuliah
            $table->foreign('mahasiswa_id')
            ->references('id')
            ->on('mahasiswas')
            ->onDelete('cascade'); //menambahkan foreign key pada kolom mahasiswa_id
            $table->foreign('matakuliah_id')
            ->references('id')
            ->on('matakuliah')
            ->onDelete('cascade'); //menambahkan foreign key pada kolom matakuliah_id
            $table->enum('nilai', ['A', 'B', 'C', 'D', 'E'])->nullable(); //menambahkan kolom nilai dengan tipe enum
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa_matakuliah');
    }
};
