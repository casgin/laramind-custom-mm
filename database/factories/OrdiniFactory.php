<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Ordini::class, function(Faker $faker, $data){

	Log::info('[Faker-Ordini]'.print_r($data, true));

	return [

		'data_ordine'  => $faker->date(),
		'importo'  => $faker->randomNumber(5),
		// 'anagrafica_cliente_id'  => $data['anagrafica_id'],
		'stati_ordine_id'  => 1,

	];

});