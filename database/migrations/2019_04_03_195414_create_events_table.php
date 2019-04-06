<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda_events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eventname');
            $table->string('description');
            $table->datetime('date');
            $table->timestamps();
        });

        Schema::create('users_agenda_events', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('event_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('event_id')
                ->references('id')
                ->on('agenda_events')->onDelete('cascade');
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
        Schema::dropIfExists('users_agenda_events');
        Schema::dropIfExists('agenda_events');
    }
}
