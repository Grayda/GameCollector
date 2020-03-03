<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeletes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->softDeletes()
        });

        Schema::table('platforms', function (Blueprint $table) {
          $table->softDeletes()
        });

        Schema::table('conditions', function (Blueprint $table) {
          $table->softDeletes()
        });

        Schema::table('types', function (Blueprint $table) {
          $table->softDeletes()
        });

        Schema::table('acquisitions', function (Blueprint $table) {
          $table->softDeletes()
        });

        Schema::table('features', function (Blueprint $table) {
          $table->softDeletes()
        });

        Schema::table('regions', function (Blueprint $table) {
          $table->softDeletes()
        });

        Schema::table('collections', function (Blueprint $table) {
          $table->softDeletes()
        });

        Schema::table('tags', function (Blueprint $table) {
          $table->softDeletes()
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
