<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ogretim_elemani')->nullable();
            $table->string('kurum_ici_proje')->nullable();
            $table->string('uluslararasi_proje')->nullable();
            $table->string('proje_durumu')->nullable();
            $table->string('proje_turu')->nullable();
            $table->string('alan_bilgisi')->nullable();
            $table->string('proje_adi')->nullable();
            $table->integer('proje_butcesi')->nullable();
            $table->string('para_birimi')->nullable();
            $table->string('kontratli_proje')->nullable();
            $table->string('dis_destekli_proje')->nullable();
            $table->string('uluslararasi_isbirlikli_proje')->nullable();
            $table->integer('arastirmaci_sayisi')->nullable();
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
        Schema::dropIfExists('projes');
    }
}
