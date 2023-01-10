<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLapangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lapangans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('namalapangan', 60);
            $table->string('kota', 50);
            $table->string('jml_lapangan', 10);
            $table->string('harga',20);
            $table->string('phone', 30);
            $table->string('aktif', 10);
            $table->string('detail');
            $table->String('gambar1');
            $table->String('gambar2');
            $table->integer('status');
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
        Schema::dropIfExists('lapangans');
    }
}
