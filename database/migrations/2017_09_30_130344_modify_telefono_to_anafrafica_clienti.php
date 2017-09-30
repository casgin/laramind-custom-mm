<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyTelefonoToAnafraficaClienti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anagrafica_cliente', function (Blueprint $table) {
            $table->string('telefono', 60)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anagrafica_clienti', function (Blueprint $table) {
            //
        });
    }
}
