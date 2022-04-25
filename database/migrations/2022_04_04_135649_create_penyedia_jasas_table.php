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
        Schema::create('penyedia_jasas', function (Blueprint $table) {
            $table->id();
            $table->string('usernameP');
            $table->string('passwordP');
            $table->string('nama_penyedia_jasa');
            $table->string('emailP');
            $table->string('telpNumbP');
            $table->string('alamat');
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
        Schema::dropIfExists('penyedia_jasas');
    }
};
