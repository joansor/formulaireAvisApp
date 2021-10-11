<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppartientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appartients', function (Blueprint $table) {
            $table->bigIncrements('appartient_id');
            // $table->unsignedBigInteger('produit_id');
            // $table->unsignedBigInteger('avisClient_id');
            //$table->foreign('produit_id')->references('produit_id')->on('produits');
            // $table->foreign('avisClient_id')->references('avisClient_id')->on('avis_clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appartients');
    }
}
