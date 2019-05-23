<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrontFillTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsitems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('summary');
            $table->text('content');
            $table->string('img_url')->nullable();
            $table->timestamps();
        });

        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('street');
            $table->string('number');
            $table->string('postal');
            $table->string('city');
            $table->timestamps();
        });

        Schema::create('contact_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->timestamps();
        });

        Schema::create('sponsors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('hyperlink');
            $table->string('img_url');
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
        Schema::dropIfExists('newsitems');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('contact_subjects');
        Schema::dropIfExists('sponsors');
    }
}
