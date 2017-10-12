<?php

namespace App\Http\Middleware;

use Closure;

class VerifyCustomConditions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	\Log::info('[VerifyCustomConditions] '.print_r($request->get('nome'), true));

    	$arDati = [
    		'nome'  => $request->get('nome'),
    		'cognome'  => $request->get('cognome'),
	    ];

    	// === Richiamo il metodo privato
	    $esito = $this->verificaDati($arDati);

	    if(!$esito)
	    {
	    	// --- Dichiaro una variabile di sessione
		    $request->session()->put('key', 'value');

		    \Session::flash('msg', 'Contenuto del messaggio');

		    return redirect('/url-destinazione'); // session('key');
	    }

        return $next($request);
    }


	/**
	 * @param $arDati
	 *
	 * @return bool
	 */
    private function verificaDati($arDati)
    {
    	// Faccio la validazione
    	return true;
    }
}
