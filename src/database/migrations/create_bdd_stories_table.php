<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBddScenariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bdd_scenarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('bdd_feature_id');
            $table->string('title');
            $table->timestamps();

            $table->foreign('bdd_feature_id')
                ->references('id')
                ->on('bdd_features')
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
        Schema::drop('bdd_scenarios');
    }
}
