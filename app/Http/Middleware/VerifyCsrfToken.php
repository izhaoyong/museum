<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Redirect,Input,Auth,Validator;
class VerifyCsrfToken extends BaseVerifier {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		// if(\Route::is('admin/oral/')||\Route::is('admin/chant')){
		// 	return $next($request);
		// }
	
		return parent::handle($request, $next);
	}

}
