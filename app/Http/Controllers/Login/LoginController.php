<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function fazerLogin(LoginRequest $request)
    {
        if(! Auth::attempt([$request->only(['email', 'password'])]) )
        {
            return redirect()
                ->back()
                ->withErrors('E-mail e/ou senha estão incorretos.');
        }

        return redirect()->route('lista_series');
    }
}
