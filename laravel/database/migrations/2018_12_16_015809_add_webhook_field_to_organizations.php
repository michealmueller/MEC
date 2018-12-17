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
        Schema::table('organizations', function(Blueprint $table){
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
