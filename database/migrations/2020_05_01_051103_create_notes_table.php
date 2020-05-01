<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('title');
            $table->text('description');
            $table->json('metadata')->nullable(); // Key / value metadata (e.g. "Serial Number" => "ABC123")
            $table->integer('item_id')->nullable(); // Allows you to associate a note with an item if you wish.
            $table->bigInteger('created_by')->nullable(); // Who created this? Used to track your own stuff.
            $table->bigInteger('updated_by')->nullable(); // Who updated this? Not used, but required by the Userstamps package
            $table->bigInteger('deleted_by')->nullable(); // Who deleted this? Not used, but required by the Userstamps package
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
