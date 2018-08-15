<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrgList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('org_list', function(Blueprint $table){
            $table->increments('id');
            $table->string('team_logo')->nullable();
            $table->string('org_name');
            $table->string('org_rsi_site');
            $table->string('org_discord')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('org_list');
    }
}
