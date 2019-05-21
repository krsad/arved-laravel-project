<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBirimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('birims', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ogretim_elemani')->nullable();
            $table->integer('tezli_yuksek_lisans')->nullable();
            $table->integer('doktora_ogrenci')->nullable();
            $table->integer('doktor_mezun')->nullable();
            $table->integer('faal_olan_ogretim_uysei_teknoloji_sirket_sayisi')->nullable();
            $table->integer('doktora_burs_programi_alan_sayisi')->nullable();
            $table->integer('doktora_burs_programi_ogrenci_sayisi')->nullable();
            $table->integer('ulusal_patent_belge_sayisi')->nullable();
            $table->integer('uluslararasi_patent_belge_sayisi')->nullable();
            $table->integer('faydali_model_ve_endustriyel_tasarim_sayisi')->nullable();
            $table->integer('odullu_ogrenci_sayisi')->nullable();
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
        Schema::dropIfExists('birims');
    }
}
