<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\AnagraficaCliente::class, function(Faker $faker){

	$iamgePath = $faker->image(public_path().DIRECTORY_SEPARATOR.config('laramind.logoFolder'));

	return [
		'nome'                  => $faker->name,
		'cognome'               => $faker->lastName,
		'email'                 => $faker->email,
		'telefono'              => $faker->phoneNumber,
		'logo'                  => str_replace(public_path(),'', $iamgePath),
		'data_contatto'         => $faker->date(),

	];

});