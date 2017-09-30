<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	    factory(\App\Models\AnagraficaCliente::class, 10)->create()->each(function($cliente){

	    	Log::info('[Cliente::id] '.$cliente->id);

	    	factory(\App\Models\Ordini::class, 5)->create(
	    		['anagrafica_cliente_id' => $cliente->id]
		    );



	    });
    }
}
