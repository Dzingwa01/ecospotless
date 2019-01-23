<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('service');
            $table->string('description');
            $table->uuid('vehicle_type_id');
            $table->decimal('price',6,2);
            $table->string('service_type');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices');
    }
}
