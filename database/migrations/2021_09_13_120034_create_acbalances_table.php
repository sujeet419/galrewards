<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcbalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acbalances', function (Blueprint $table) {
            $table->id();
            $table->string('admin_id');
            $table->string('date');
            $table->string('email');
            $table->string('point_earned');
            $table->string('point_used');
            $table->string('point_added');
            $table->string('bonus_earned');
            $table->string('closing_balance');
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
        Schema::dropIfExists('acbalances');
    }
}
