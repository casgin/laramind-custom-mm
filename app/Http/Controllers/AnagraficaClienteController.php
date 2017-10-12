<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Constraint\RegularExpression;

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

	public function create() {
		return view('anagrafica-cliente.create');
	}


	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function store(Request $request) {

		// === Vado a validare i dati del
		$this->validate($request,[
			'nome'  => 'required|max:255',
			'cognome'  => 'required|max:255',
			'email'  => 'required|unique:anagrafica_cliente,email|max:200',
			'logo'  => 'max:50000|mimetypes:image/jpeg,image/png'
		]);

		// === Se passo la validazione, vado a scrivere il record
		$mdl = new \App\Models\AnagraficaCliente();
		$mdl->nome = $request->get('nome');
		$mdl->cognome = $request->get('cognome');
		$mdl->email = $request->get('email');
		$mdl->telefono = $request->get('telefono');
		$mdl->data_contatto = $request->get('data_contatto');


		// === Devo effettuare lo stroage del file
		$fileExstension = $request->file('logo')->extension();
		$fileName = md5(sha1($request->file('logo')->getClientOriginalName()).time().'KKPOAI')
		                .'.'
		                .$fileExstension; // estensione del file

		$request->file('logo')->storeAs(
			config('laramind.uploadFolder'),
			$fileName
		);

		$mdl->logo = $fileName;
		$mdl->save();

		return redirect()
					->route('anagrafica-clienti.index')
					->with('status', 'Anagrafica Inserita');

	}



	public function show($id) {

		// --- Recuperare il record (informazione anche nel caso in cui non esiste)

		// --- Visualizzare la Vista
		return view('anagrafica-cliente.show')->with(['id' => $id]);

	}


	public function update($id) {
		// === Recupero il model
		$mdl = new \App\Models\AnagraficaCliente();

		$data = $mdl::find($id)->toArray();

		\Debugbar::info($data['logo']);
		// \Debugbar::info(Storage::get(config('uploadFolder').DIRECTORY_SEPARATOR.$data['logo']));

		// --- Mostro la maschera
		return view('anagrafica-cliente.edit')
				->with([
					'anagrafica' => $data,
					'logoEncoded'      => Storage::get(config('uploadFolder').DIRECTORY_SEPARATOR.$data['logo']),
				]);

	}
	public function updateApply(Request $request, $id) {

		// === Vado a validare i dati del
		$this->validate($request,[
			'nome'  => 'required|max:255',
			'cognome'  => 'required|max:255',
			'email'  => 'required|unique:anagrafica_cliente,email|max:200',
			'logo'  => 'max:50000|mimetypes:image/jpeg,image/png'
		]);

		$mdl = new \App\Models\AnagraficaCliente();
		$anagraficaObj = $mdl::find($id);

		if(!$anagraficaObj)
		{
			// --- redirecrt con messaggio di errore flash
		}



		$input = [
			'nome'  => $request->get('nome'),
			'cognome'  => $request->get('cognome'),
			'email'  => $request->get('email'),
			'telefono'  => $request->get('telefono'),
			'data_contatto'  => $request->get('data_contatto'),
		];

		if($request->hasFile('logo'))
		{
			// === Faccio il caricamento del file
			// === Devo effettuare lo stroage del file
			$fileExstension = $request->file('logo')->extension();
			$fileName = md5(sha1($request->file('logo')->getClientOriginalName()).time().'KKPOAI')
			            .'.'
			            .$fileExstension; // estensione del file

			$request->file('logo')->storeAs(
				config('laramind.uploadFolder'),
				$fileName
			);

		}

		$input['logo'] = $fileName;

		$anagraficaObj->update($input);
		$anagraficaObj->save();

		// === altro redirect con messaggio flash

	}


	public function delete() {}

	/**
	 * @param Request $request
	 * @param $id
	 *
	 * @return $this
	 */
	public function getAnagraficaDetail(Request $request, $id)
	{
		sleep(2);

		// === Recupero il record
		$mdl = new \App\Models\AnagraficaCliente();

		// --- Formatto l'output, caso negativo di default
		$arOut = [
			'statusCode' => '404',
			'data'  => []
		];

		$data = $mdl::find($id);
		if($data)
		{
			$arOut = [
				'statusCode' => '200',
				'data'  => $data->toArray(),
				'ordini' => $data->ordinis()->get()->toArray(),
			];

		}


		// === Resituisco output JSON
		return response()
			->json($arOut)
			->withCallback($request->input('callback'));

	}



	public function mascheraJavascript()
	{
		return view('anagrafica-cliente.maschera-javascript');
	}

}
