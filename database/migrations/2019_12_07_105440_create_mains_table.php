<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('country');
            $table->string('region');
            $table->string('city');
            $table->string('street');
            $table->string('number');
            $table->string('homeDesc')->default(null)->nullable();
            $table->string('latitude');
            $table->string('longitude');
            $table->bigInteger('object_type_id')->unsigned()->index();
            $table->bigInteger('specialization_id')->unsigned()->index();
            $table->bigInteger('product_range_id')->unsigned()->index();
            $table->string('supplier');
            $table->string('erdpou_code');
            $table->decimal('retail_space');
            $table->bigInteger('opening_id')->unsigned()->index();
            $table->string('opening_desc')->default(null)->nullable();
        });

        Schema::table('mains', function (Blueprint $table) {
            $table->foreign('object_type_id')
                ->on('object_types')
                ->references('id')
                ->onDelete('CASCADE');
            $table->foreign('specialization_id')
                ->on('specializations')
                ->references('id')
                ->onDelete('CASCADE');
            $table->foreign('product_range_id')
                ->on('range_products')
                ->references('id')
                ->onDelete('CASCADE');
            $table->foreign('opening_id')
                ->on('openings')
                ->references('id')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mains');
    }
}
