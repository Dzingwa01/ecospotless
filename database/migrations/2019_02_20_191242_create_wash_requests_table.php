<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWashRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('wash_requests', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->dateTime('wash_date');
            $table->uuid('price_id');
            $table->uuid('valet_id')->nullable();
            $table->uuid('client_id');
            $table->string('wash_location');
            $table->text('extra_notes')->nullable();
            $table->string('status');
            $table->uuid('rating_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wash_requests');
    }
}
