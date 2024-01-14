<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function getRegistration()
    {
        return view('auth.registration');
    }

    public function postRegistration(Request $request): RedirectResponse
    {
        $v = Validator::make($request->all(), [
            'full_name' => 'required|string|regex:/^[А-ЯЁё\h-]+$/ui',
            'email' => 'required|email',
            'login' => 'required|string|unique:users,login|regex:/^[A-Z.]+$/ui',
            'password' => 'required|string',
            'password_confirmation' => 'same:password',
            'agreement' => 'accepted',
        ]);

        if ($v->fails()) {
            return redirect()
                ->back()
                ->withErrors($v->errors())
                ->withInput();
        }

        $user = User::query()->create(
            $request
                ->merge(['password' => Hash::make($request->password)])
                ->except(['password_confirmation', 'agreement'])
        );

        Auth::login($user);

        return redirect()->route('applications.index');
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request): RedirectResponse
    {
        $v = Validator::make($request->all(), [
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($v->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($v->errors());
        }

        if (!Auth::attempt($request->only(['login', 'password']))) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['message' => 'Invalid email or password.']);
        }

        return redirect()->route('applications.index');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('login.get');
    }
}
