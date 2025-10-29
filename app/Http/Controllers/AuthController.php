<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{

    public function signInPage(Request $request){
        return view('Auth/login');
    }

    public function signUpPage(Request $request){
        return view('Auth/register');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password)
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Conta criada com sucesso!');
    }

    public function login(Request $request){
        try{
            $credentials = $request->validate([
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:6'
            ]);

            if (Auth::attempt($credentials)){
                $request->session()->regenerate();
                return redirect('/');
            }

            return back()->withErrors([
                'email' => 'E-mail ou senha inválidos',
            ])->onlyInput('email');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
