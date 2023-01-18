<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('deskripsi');
            $table->string("gambar");
            $table->string("kategori");
            $table->string("alamat");
            $table->bigInteger("noHp");
            $table->string("namaToko");
            $table->timestamps();
            $table->unsignedBigInteger("usersId");
            $table->foreign('usersId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
