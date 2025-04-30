<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'matricule' => 'required|string|unique:users,matricule',
            'date_of_birth' => 'required|date',
            'school' => 'required|string',
            'department' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
           'id_card' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:5120'],
           'school_resit' => ['required', 'file', 'mimes:pdf', 'max:5120'],
        ]);

         // Handle file uploads
         $idCardPath = $request->file('id_card')->store('uploads/id_cards', 'public');
         $schoolResitPath = $request->file('school_resit')->store('uploads/school_resits', 'public');
 

         $user = User::create([
            'name' => $validated['name'],
            'matricule' => $validated['matricule'],
            'date_of_birth' => $validated['date_of_birth'],
            'school' => $validated['school'],
            'department' => $validated['department'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), // Hash the password
            'id_card' => $idCardPath, // Store file path in DB
            'school_resit' => $schoolResitPath, // Store file path in DB
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('login')->with('success', 'Account created successfully! Please log in.');
    }
}
