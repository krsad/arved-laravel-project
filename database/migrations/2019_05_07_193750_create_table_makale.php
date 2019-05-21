<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMakale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('makale', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ogretim_elemani')->nullable();
            $table->string('yayin_turu')->nullable();
            $table->string('endeks_turu')->nullable();
            $table->string('isim')->nullable();
            $table->string('yazarlar')->nullable();
            $table->string('dergi_adi')->nullable();
            $table->string('konferans_adi')->nullable();
            $table->string('cilt')->nullable();
            $table->integer('numara')->nullable();
            $table->integer('sayfa')->nullable();
            $table->string('yil')->nullable();
            $table->string('doi')->nullable();
            $table->string('proje_yurutucusu')->nullable();


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
        Schema::dropIfExists('makele');
    }
}
