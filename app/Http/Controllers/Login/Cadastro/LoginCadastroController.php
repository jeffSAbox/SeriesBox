<?php

namespace App\Http\Controllers\Login\Cadastro;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginCadastrarRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginCadastroController extends Controller
{
    public function index()
    {
        return view('login.cadastrar.index');
    }

    public function store(LoginCadastrarRequest $request)
    {
        $data = $request->except(['_token']);
        $data['password'] = Hash::make($data['password']);

        $usuario = User::create($data);
        Auth::login($usuario);

        return redirect()->route('listar_series');
    }
}
