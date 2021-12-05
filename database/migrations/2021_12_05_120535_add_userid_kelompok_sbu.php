<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUseridKelompokSbu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sbu', function (Blueprint $table) {
            $table->string('users_id');
            $table->string('kelompok');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sbu', function (Blueprint $table) {
            $table->dropColumn('users_id');
            $table->dropColumn('kelompok');
        });
    }
}
