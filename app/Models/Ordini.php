<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 30 Sep 2017 13:43:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Ordini
 * 
 * @property int $id
 * @property \Carbon\Carbon $data_ordine
 * @property float $importo
 * @property int $anagrafica_cliente_id
 * @property int $stati_ordine_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\AnagraficaCliente $anagrafica_cliente
 * @property \App\Models\StatiOrdine $stati_ordine
 *
 * @package App\Models
 */
class Ordini extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'ordini';

	protected $casts = [
		'importo' => 'float',
		'anagrafica_cliente_id' => 'int',
		'stati_ordine_id' => 'int'
	];

	protected $dates = [
		'data_ordine'
	];

	protected $fillable = [
		'data_ordine',
		'importo',
		'anagrafica_cliente_id',
		'stati_ordine_id'
	];

	public function anagrafica_cliente()
	{
		return $this->belongsTo(\App\Models\AnagraficaCliente::class);
	}

	public function stati_ordine()
	{
		return $this->belongsTo(\App\Models\StatiOrdine::class);
	}
}
