<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class RegisteredUserController extends Controller
{
	/**
	 * Display the registration view.
	 */
	public function create(): View
	{
		return view('auth.register');
	}

	/**
	 * Handle an incoming registration request.
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	public function store(Request $request): RedirectResponse
	{

		$request->validate([
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', 'confirmed', Rules\Password::defaults()],
			'role' => ['required', 'in:student,teacher'],
		]);



		// Maak de gebruiker aan
		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
		]);



		// Koppel de gebruiker aan een student of docent
		if ($request->role === 'student') {
			Student::create([
				'user_id' => $user->id,
				'naam'	=>	$request->name,
				'email'	=>	$request->email,
				'wachtwoord'	=>	Hash::make($request->password),
			]);
			Log::info('Student aangemaakt');
		} elseif ($request->role === 'teacher') {
			Teacher::create([
				'user_id' => $user->id,
				'naam'	=>	$request->name,
				'email'	=>	$request->email,
				'wachtwoord'	=>	Hash::make($request->password)
			]);
		}

		Auth::login($user); // Automatisch inloggen


		return redirect($user->isTeacher() ? route('teacher.dashboard') : route('student.dashboard'));
	}
}
