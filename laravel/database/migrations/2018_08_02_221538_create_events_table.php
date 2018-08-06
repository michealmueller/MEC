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

        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->dateTimeTz('start_date');
            $table->dateTimeTz('end_date');
            $table->string('backgroundColor')->nullable();
            $table->string('textColor')->nullable();
            $table->string('borderColor')->nullable();
            $table->boolean('allDay')->nullable();
            $table->string('comments');
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

        Schema::drop("events");

    }

}