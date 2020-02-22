<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
          // This table contains the actual items you have (e.g. games, consoles, accessories)
            $table->bigIncrements('id');
            $table->string('title'); // The title of the item.
            $table->string('description')->nullable(); // The description of the item.
            $table->text('platform_id'); // What platform does this belong to (e.g. Nintendo, Sega etc.)
            $table->text('notes')->nullable(); // Extra notes about this item.
            $table->date('acquired_at')->nullable(); // When was this purchased / obtained?
            $table->float('purchase_price', 8, 2)->nullable(); // How much did you buy this for?
            $table->integer('acquisition_id')->nullable(); // How was this obtained?
            $table->integer('condition_id')->nullable(); // What condition is this item in?
            $table->bigInteger('parent_id')->nullable(); // Does this belong to another item? For example, A transfer pak would have Pokemon Stadium as a parent.
            $table->bigInteger('created_by'); // Who created this? Used to track your own stuff.
            $table->bigInteger('updated_by'); // Who updated this? Not used, but required by the Userstamps package
            $table->bigInteger('deleted_by')->nullable(); // Who deleted this? Not used, but required by the Userstamps package
            $table->json('metadata')->nullable(); // Key / value metadata (e.g. "Serial Number" => "ABC123")
            $table->softDeletes(); // Don't delete the row from the database, just mark the item as deleted and keep the row
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
        Schema::dropIfExists('items');
    }
}
