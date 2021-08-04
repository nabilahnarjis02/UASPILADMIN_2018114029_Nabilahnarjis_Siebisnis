<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hps', function (Blueprint $table) {
            $table->id();
            $table->string('kode_admin');
            $table->string('nama');
            $table->string('SMA');
            $table->string('S1');
            $table->string('S2');
            $table->string('S3');
            $table->timestamps();
        });
    }
}
