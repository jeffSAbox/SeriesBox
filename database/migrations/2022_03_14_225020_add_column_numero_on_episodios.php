<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnNumeroOnEpisodios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('episodios', function (Blueprint $table) {
            $table->integer('numero')->nullable(true);
            $table->string('nome')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('episodios', function (Blueprint $table) {
            $table->dropColumn('numero');
            $table->integer('nome')->change();
        });
    }
}
