<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonusPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonus_points', function (Blueprint $table) {
            $table->id();
            $table->string('admin_id');
            $table->string('user_email');
            $table->string('bonus_point');
            $table->string('bonus_reason');
            $table->integer('source')->default(0);
			$table->integer('bonus_status');
            $table->integer('bonus_date');
            $table->integer('update_status');
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
        Schema::dropIfExists('bonus_points');
    }
}
