<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Session\CookieSessionHandler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validate = $request->validate([
            'email' => 'email|required',
            'password' => 'min:6|max:100|required'
        ]);

        $success = Auth::attempt(['email' => $validate['email'], 'password' => $validate['password']], true);

        if(!$success) {
            return back()->withErrors(['message' => 'Wrong email or password'])->withInput();
        }

        return redirect('/');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'min:4|max:100|required',
            'email' => 'email|required',
            'password' => ['required', 'confirmed', Password::min(8)->letters()->symbols()->numbers()]
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $register = new User($validatedData);
        $register->save();

        Log::info('New user created.');
        return redirect('/login')->with('message', 'Login Success');
    }

    public function logout()
    {
        Auth::logout();
        return back()->with('message', 'Cookie berhasil dihapus');
    }
}
