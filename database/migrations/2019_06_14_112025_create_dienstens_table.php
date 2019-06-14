<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDienstensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dienstens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('naam');
            $table->string('coach_naam');
            $table->datetime('start_datetime');
            $table->datetime('eind_datetime');

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
        Schema::dropIfExists('dienstens');
    }
}
