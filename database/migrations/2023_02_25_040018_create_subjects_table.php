<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//ganti nama tabel tanpa s dibelakang
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
// tambah kolom
            $table->string('nama', 100)->nullable();
            $table->enum('gender', ['L', 'P'])->default('L');
            $table->unsignedBigInteger('subjects_id');
            $table->string('asalsekolah', 30)->nullable();
            $table->string('tempatlahir', 30)->nullable();
            $table->date('tanggallahir')->nullable();
            $table->timestamps();
// Jadikan berikan FK (Foreign Key)
            $table->foreign('subjects_id')
                  ->references('id')->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
// ketika rollback kembalikan semua
        Schema::dropIfExists('subjects');
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropForeign('subjects_jurusan_id_foreign');
        });
    }
}