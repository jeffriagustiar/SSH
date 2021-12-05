<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHspkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hspk', function (Blueprint $table) {
            $table->string('hspk_id');
            $table->string('kode')->nullable();
            $table->string('uraian');
            $table->string('spek');
            $table->string('satuan');
            $table->string('harga');
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
        Schema::dropIfExists('hspk');
    }
}
