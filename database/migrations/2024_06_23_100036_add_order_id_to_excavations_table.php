<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderIdToExcavationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('excavations', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id')->after('engineer');

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('excavations', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropColumn('order_id');
        });
    }
}
