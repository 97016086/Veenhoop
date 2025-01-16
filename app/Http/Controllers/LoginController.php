<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use	Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	/**
	 * Een authenticatiepoging afhandelen
	 * 
	 */
	public	function	authenticate(Request	$request)
	{
		$credentials =	$request->validate([
			'email'	=> ['required',	'email'],
			'password'	=>	['required'],
		]);

		if (Auth::attempt($credentials)) {
			$request->session()->regenerate();

			return	redirect()->intended('grades');
		}

		return back()->withErrors([
			'email'	=>	'De ingevoerde gegevens komen niet overeen met onze gegevens',
		])->onlyInput('email');
	}
}
