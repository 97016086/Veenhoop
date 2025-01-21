<?php

namespace	App\Http\Controllers\Auth;

use	App\Http\Controllers\Controller;
use	App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
use	Illuminate\Auth\Events\Registered;
use	Illuminate\Http\RedirectResponse;
use	Illuminate\Http\Request;
use	Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use	Illuminate\Validation\Rules;
use	Illuminate\View\View;

class	RegisteredUserController	extends	Controller
{
	/**
	 * Display	the	registration	view.
	 */
	public	function create()
	{
		return	view('auth.register');
	}

	/**
	 * Handle	an	incoming	registration	request.
	 * 
	 * @throws \Illuminate\Validation\ValidationException
	 */

	public	function	store(Request	$request)
	{
		$request->validate([
			'name'	=>	['required',	'string',	'max:255'],
			'email'	=>	['required',	'string',	'lowercase', 'email', 'max:255', 'unique:' . User::class],
			'password'	=>	['required',	'confirmed',	Rules\Password::defaults()],
			'role'	=>	['required', 'in:teacher,student'],
		]);

		$user	=	User::create([
			'name'	=>	$request->name,
			'email'	=>	$request->email,
			'password'	=>	Hash::make($request->password)
		]);

		//	Rol-specifieke gegevens aanmmaken 
		if ($request->role	===	'teacher') {
			Teacher::create(['user_id'	=>	$user->id]);
		} elseif ($request->role	===	'student') {
			Student::create(['user_id'	=>	$user->id]);
		}

		Auth::login($user);

		return	redirect(route('dashboard', false));
	}
}
