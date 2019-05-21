<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFirstModalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('first', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('ogretim_elemani',120);
            $table->integer('wos_h_index');
            $table->integer('wos_atif_sayisi');
            $table->integer('scopus_h_index');
            $table->integer('scopus_atif_sayisi');
            $table->string('uzmanlik_alani');

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
        Schema::dropIfExists('first_modals');
    }
}
