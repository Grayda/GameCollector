<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeTitlesUnique extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('conditions', function (Blueprint $table) {
        $table->unique('title');
      });

      Schema::table('types', function (Blueprint $table) {
        $table->unique('title');
      });

      Schema::table('acquisitions', function (Blueprint $table) {
        $table->unique('title');
      });

      Schema::table('features', function (Blueprint $table) {
        $table->unique('title');
      });

      Schema::table('regions', function (Blueprint $table) {
        $table->unique('title');
      });

      Schema::table('tags', function (Blueprint $table) {
        $table->unique('title');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
