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
            $table->datetime('enddate');
            $table->string('location');
            $table->string('transport')->nullable();
            $table->unsignedInteger('organiser_id');
            $table->boolean('cancelled')->default(0);
            $table->string('image_url')->nullable();
            $table->timestamps();
            $table->foreign('organiser_id')
                ->references('id')
                ->on('users')->onDelete('cascade');
        });

        Schema::create('users_agenda_events', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('event_id');
            $table->boolean('applied')->default(0);

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
