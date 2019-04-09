<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePcItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url');
            $table->smallInteger('pc_status');
            $table->smallInteger('original_status');
            $table->mediumText('body');
            $table->smallInteger('process_status')->index();
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
        Schema::dropIfExists('pc_items');
    }
}
