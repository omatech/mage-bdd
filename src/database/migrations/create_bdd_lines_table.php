<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBddLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bdd_lines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('lineable');
            $table->enum('type', ['as_a', 'i_want', 'so_that', 'given', 'when', 'then',]);
            $table->longText('text');
            $table->timestamps();

            $table->foreign('bdd_scenario_id')
                ->references('id')
                ->on('bdd_scenarios')
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
        Schema::drop('bdd_lines');
    }
}
