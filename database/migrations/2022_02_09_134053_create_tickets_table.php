<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            // $table->id();
            $table->foreignId('lapangan_id');
            $table->foreignId('user_id');
            $table->string('pemesan');
            $table->string('namalapangan',50);
            $table->string('jam',5);
            $table->string('hari',5);
            $table->string('lapangan',5);
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
        Schema::dropIfExists('tickets');
    }
}
