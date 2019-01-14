<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserFieldsToDiscordbotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('discordbot', function (Blueprint $table) {
            //
            $table->integer('user_id')->nullable()->index();
            $table->string('username')->nullable();

            $table->string('organization_name')->nullable()->change();
            $table->integer('organization_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('discordbot', function (Blueprint $table) {
            //
            $table->dropIfExists('user_id');
            $table->dropIfExists('username');
        });
    }
}
