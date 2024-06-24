<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyFilesTypeInExcavationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('excavations', function (Blueprint $table) {
            if (!Schema::hasColumn('excavations', 'images')) {
                $table->json('images')->nullable()->after('nature_of_work');
            }
            if (!Schema::hasColumn('excavations', 'documents')) {
                $table->json('documents')->nullable()->after('images');
            }
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
            if (Schema::hasColumn('excavations', 'images')) {
                $table->dropColumn('images');
            }
            if (Schema::hasColumn('excavations', 'documents')) {
                $table->dropColumn('documents');
            }
        });
    }
}
