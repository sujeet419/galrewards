<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createagencygroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('agencygroups', function (Blueprint $table) {
            $table->id();
		     $table->string('agency_name');
			$table->string('contact_no');
			$table->string('email');
			$table->string('address');
            $table->string('status');
			
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
        Schema::dropIfExists('agencygroups');
    }
}
