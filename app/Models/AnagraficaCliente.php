<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 01 Oct 2017 09:02:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AnagraficaCliente
 * 
 * @property int $id
 * @property string $nome
 * @property string $cognome
 * @property string $email
 * @property string $telefono
 * @property string $logo
 * @property \Carbon\Carbon $data_contatto
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $ordinis
 *
 * @package App\Models
 */
class AnagraficaCliente extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'anagrafica_cliente';

	protected $dates = [
		'data_contatto'
	];

	protected $fillable = [
		'nome',
		'cognome',
		'email',
		'telefono',
		'logo',
		'data_contatto'
	];

	public function ordinis()
	{
		return $this->hasMany(\App\Models\Ordini::class);
	}
}
