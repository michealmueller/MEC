<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrganizaitonIdToRecentActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recent_activity', function (Blueprint $table) {
            //
            $table->integer('user_id')->nullable()->change();
            $table->integer('organization_id')->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recent_activity', function (Blueprint $table) {
            //
            $table->dropIfExists('organization_id');
        });
    }
}
