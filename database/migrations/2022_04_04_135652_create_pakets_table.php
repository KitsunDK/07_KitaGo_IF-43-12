<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pakets', function (Blueprint $table) {
            $table->id();
            $table->string('namaPaket');
            $table->integer('harga');
            $table->longText('deskripsi');
            $table->unsignedBigInteger('idPenginapan');
            $table->unsignedBigInteger('idWisata');
            $table->unsignedBigInteger('idJasa');
            $table->timestamps();

            $table->foreign('idPenginapan')->references('id')->on('penginapans');
            $table->foreign('idWisata')->references('id')->on('wisatas');
            $table->foreign('idJasa')->references('id')->on('penyedia_jasas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pakets');
    }
};
