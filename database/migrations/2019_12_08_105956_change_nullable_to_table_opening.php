<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNullableToTableOpening extends Migration
{
    public function up()
    {
        Schema::table('openings', function (Blueprint $table) {
            $table->string('monday')->nullable()->change();
            $table->string('tuesday')->nullable()->change();
            $table->string('wednesday')->nullable()->change();
            $table->string('thursday')->nullable()->change();
            $table->string('friday')->nullable()->change();
            $table->string('saturday')->nullable()->change();
            $table->string('sunday')->nullable()->change();
        });
    }
}
