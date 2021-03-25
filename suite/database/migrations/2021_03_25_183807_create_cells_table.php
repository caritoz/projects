<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cells', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('row_id');
            $table->unsignedBigInteger('column_id');
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('row_id')
                ->references('id')
                ->on('rows')
                ->onDelete('cascade');

            $table->foreign('column_id')
                ->references('id')
                ->on('columns')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cells');
    }
}
