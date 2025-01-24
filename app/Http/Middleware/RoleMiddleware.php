<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
	 */
	public function handle(Request $request, Closure $next, $role): Response
	{
		if ($role	===	'teacher'	&&	!$request->user()->isTeacher()) {
			abort(403,	'Toegang	geweigerd.');
		}

		if ($role	===	'student'	&&	!$request->user()->isStudent()) {
			abort(403, 'toegang	geweigerd');
		}

		return $next($request);
	}
}
