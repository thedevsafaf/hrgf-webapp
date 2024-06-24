<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcavationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excavations', function (Blueprint $table) {
            $table->id();
            $table->string('engineer');
            $table->string('company');
            $table->string('location');
            $table->string('nature_of_work');
            $table->string('images')->nullable();
            $table->string('documents')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('excavations');
    }
}
