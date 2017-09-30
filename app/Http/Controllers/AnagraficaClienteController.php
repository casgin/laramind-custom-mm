<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnagraficaClienteController extends Controller
{

	public function index() {
		$mdlCliente = new \App\Models\AnagraficaCliente();

		$arWhere = [
			['nome','like', 'prof%'],
		];

		$data = $mdlCliente::where($arWhere)->orderBy('id','desc')->get();

		return view('anagrafica-cliente.index')
					->with(['elencoAnagrafica' => $data]);

	}

	public function create() {}
	public function store() {}
	public function show() {}
	public function update() {}
	public function updateApply() {}
	public function delete() {}



}
