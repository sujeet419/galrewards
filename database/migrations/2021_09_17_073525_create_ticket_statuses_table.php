<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('admin_id');
            $table->integer('user_id');
            $table->integer('ticket_id');
            $table->string('consultant_first_name');
            $table->string('consultant_last_name');
            $table->string('consultant_email');
            $table->string('contact');
            $table->string('support_actions');
            $table->string('final_resolution');
            $table->string('status');
            $table->string('elaborate_problems');
            $table->string('date_Of_closure')->nullable();
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
        Schema::dropIfExists('ticket_statuses');
    }
}
