<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->timestamps();
        });

        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order')->unsigned();
            $table->string('name');
            $table->string('content')->nullable();
            $table->integer('type_id')->unsigned();
            $table->boolean('default_section');
            $table->string('img_url')->nullable();
            $table->timestamps();

            $table->foreign('type_id')
            ->references('id')
            ->on('section_types')->onDelete('cascade');

        });

        Schema::create('default_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order')->unsigned();
            $table->string('name');
            $table->string('content');
            $table->integer('type_id')->unsigned();
            $table->boolean('default_section');
            $table->timestamps();

            $table->foreign('type_id')
            ->references('id')
            ->on('section_types')->onDelete('cascade');

        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
        Schema::dropIfExists('default_sections');
        Schema::dropIfExists('section_types');
    }
}
