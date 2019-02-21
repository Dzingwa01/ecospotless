<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wash_requests', function (Blueprint $table) {
            //
            $table->dateTime('wash_date')->date()->change();
            $table->time('wash_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wash_requests', function (Blueprint $table) {
            //
        });
    }
}
