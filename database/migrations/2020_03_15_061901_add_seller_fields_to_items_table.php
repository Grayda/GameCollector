<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSellerFieldsToItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->decimal('selling_price', 8, 2)->nullable(); // How much are you wanting for this item?
            $table->decimal('sold_price', 8, 2)->nullable(); // How much did you sell this item for?
            $table->integer('sold_method_id')->nullable(); // Where did you sell it?
            $table->date('sold_at')->nullable(); // When did you sell it?
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            //
        });
    }
}
