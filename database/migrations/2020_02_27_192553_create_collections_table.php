<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('collection_id'); // Because we're not going to use an integer for the primary key
            $table->string('title'); // Collection title
            $table->text('description')->nullable(); // Collection description
            $table->boolean('public')->default(false); // Is this collection public?
            $table->bigInteger('created_by')->nullable(); // Who created this? Used to track your own stuff.
            $table->bigInteger('updated_by')->nullable(); // Who updated this? Not used, but required by the Userstamps package
            $table->bigInteger('deleted_by')->nullable(); // Who deleted this? Not used, but required by the Userstamps package
            $table->timestamps();
        });

        Schema::create('collection_item', function (Blueprint $table) {
            $table->bigInteger('collection_id'); // Who created this? Used to track your own stuff.
            $table->bigInteger('item_id'); // Who updated this? Not used, but required by the Userstamps package
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collections');
    }
}
