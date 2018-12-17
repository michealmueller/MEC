<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWebhookFieldToOrganizations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('discordbot', function(Blueprint $table){
            $table->increments('id')->unique();
            $table->integer('organization_id')->unique();
            $table->string('organization_name')->unique();
            $table->string('public_webhook_url')->nullable();
            $table->string('private_webhook_url')->nullable();
            $table->string('public_channel_id')->nullable();
            $table->string('private_channel_id')->nullable();
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
    }
}
