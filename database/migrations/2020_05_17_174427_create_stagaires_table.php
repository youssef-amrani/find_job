<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stagaires', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("content");
            $table->string("type_offre");
            $table->string("Localisation");
            $table->date("date_debut");
            $table->date("date_fin");
            $table->unsignedBigInteger('recruteur_id');
            $table->foreign('recruteur_id')->references('id')->on('recruteurs');
            $table->timestamps();
            $table->engine='InnoDB';
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stagaires');
    }
}
