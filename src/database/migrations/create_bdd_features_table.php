<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBddFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bdd_features', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('bdd_domain_id');
            $table->string('title');
            $table->timestamps();

            $table->foreign('bdd_domain_id')
                ->references('id')
                ->on('bdd_domains')
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
        Schema::drop('bdd_features');
    }
}
