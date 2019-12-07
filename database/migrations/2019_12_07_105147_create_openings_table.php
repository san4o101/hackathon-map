<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('openings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('monday');
            $table->string('tuesday');
            $table->string('wednesday');
            $table->string('thursday');
            $table->string('friday');
            $table->string('saturday');
            $table->string('sunday');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('openings');
    }
}
