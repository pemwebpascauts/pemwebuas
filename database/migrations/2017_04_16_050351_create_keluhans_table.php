<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeluhansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluhans', function (Blueprint $table) {
            $table->increments('id_keluhan');
            $table->string('id_user');
            $table->integer('jenis_keluhan');
            $table->text('isi_keluhan');
            $table->boolean('keanoniman')->default(0);
            $table->integer('status_keluhan');
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
        Schema::drop('keluhans');
    }
}
