<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('codRegioes');
            $table->foreign("codRegioes")->references("id")->on("regioes");
            $table->string("nome", 150);
            $table->string("img", 120);
            $table->string("desc", 250)->nullable(true);
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
        Schema::dropIfExists('festas');
    }
}
