<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            // $table->id();
            $table->foreignId('user_id');
            $table->foreignId('lapangan_id');
            $table->string('pemesan');
            $table->string('namalapangan', 60);
            $table->string('nominal', 60);
            $table->string('jam',50);
            $table->string('hari',50);
            $table->string('lapangan',50);
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
        Schema::dropIfExists('transaksis');
    }
}
