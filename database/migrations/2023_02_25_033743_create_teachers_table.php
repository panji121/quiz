<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateteachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
// ganti nama tabel
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
//tambah field (kolom)
            $table->string('teachers', 50)->nullable();
            $table->unsignedInteger('kapasitas')->nullable();
            $table->unsignedInteger('terisi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
// Ketika rollback tabel akan ikut di hapus
        Schema::dropIfExists('teachers');
    }
}