<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\ValidDNI;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

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
            'name' => ['required', 'string', 'min:2', 'max:20', 'regex:/^([^0-9]*)$/'],
            'surnames' => ['required', 'string', 'min:2', 'max:40', 'regex:/^([^0-9]*)$/'],
            'dni' => ['required', 'string', 'size:9', new ValidDNI],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', 'min:10', Password::min(10)->mixedCase()->numbers()->symbols()->letters()],
            'telephone' => ['nullable', 'string', 'min:9', 'max:13', 'regex:/^\+[0-9]{1,3}[0-9]{9}$/'],
            'country' => ['nullable', 'string'],
            'aboutYou' => ['nullable', 'string'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'surnames' => $request->surnames,
            'dni' => $request->dni,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telephone' => $request->telephone,
            'country' => $request->country,
            'aboutYou' => $request->aboutYou,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
