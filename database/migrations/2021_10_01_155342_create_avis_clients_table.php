<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvisClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avis_clients', function (Blueprint $table) {
            $table->id('avisClients_id');
            $table->string('email',255);
            $table->string('pseudo',255);
            $table->integer('note',false,false);
            $table->longText('comment');
            $table->mediumText('picture');
            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avis_clients');
    }
}
