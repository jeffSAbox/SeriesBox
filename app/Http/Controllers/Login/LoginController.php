<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function fazerLogin(LoginRequest $request)
    {

        $email = $request->email;
        $password = $request->password;
        
        if(! Auth::attempt(['email' => $email, 'password' => $password]) )
        {
            return redirect()
                ->back()
                ->withErrors('E-mail e/ou senha estão incorretos.');
        }

        return redirect()->route('listar_series');
    }
}
