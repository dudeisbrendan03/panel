<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDenyListToAllowNull extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eggs', function (Blueprint $table) {
            DB::update("ALTER TABLE eggs CHANGE `file_denylist` `file_denylist` text NULL;");
            DB::update("UPDATE eggs SET file_denylist = NULL WHERE file_denylist = "";");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eggs', function (Blueprint $table) {
            DB::update("ALTER TABLE eggs CHANGE `file_denylist` `file_denylist` text NOT NULL;");
            DB::update("UPDATE eggs SET file_denylist = "" WHERE file_denylist = NULL;")
        });
    }
}
