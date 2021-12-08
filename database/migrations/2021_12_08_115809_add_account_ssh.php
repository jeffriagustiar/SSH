<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAccountSsh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ssh', function (Blueprint $table) {
            $table->dropColumn('pesan');
            $table->string('r1')->nullable();
            $table->string('r2')->nullable();
            $table->string('r3')->nullable();
            $table->string('r4')->nullable();
            $table->string('r5')->nullable();
            $table->string('r6')->nullable();
            $table->string('r7')->nullable();
            $table->string('r8')->nullable();
            $table->string('r9')->nullable();
            $table->string('r10')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ssh', function (Blueprint $table) {
            $table->longText('pesan');
            $table->string('r1');
            $table->dropColumn('r2');
            $table->dropColumn('r3');
            $table->dropColumn('r4');
            $table->dropColumn('r5');
            $table->dropColumn('r6');
            $table->dropColumn('r7');
            $table->dropColumn('r8');
            $table->dropColumn('r9');
            $table->dropColumn('r10');
        });
    }
}
