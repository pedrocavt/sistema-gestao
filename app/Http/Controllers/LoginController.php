<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';

        if ($request->get('erro') == 1) {
            $erro = 'Usuario ou senha inválidos';
        }

        if ($request->get('erro') == 2) {
            $erro = 'Necessário estar logado';
        }


        return view('site.login', ["erro" => $erro]);
    }

    public function autenticar(Request $request)
    {
        //regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //mensagem de feedback
        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        //inicia o model user
        $user = new User();
        //verificando usuario
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if (isset($usuario->name)) {
            session_start();
            $_SESSION['nome'] = $usuario->name;

            return redirect()->route('app.home');
        }

        return redirect()->route('site.login', ['erro' => 1]);
    }

    public function sair()
    {
        session_destroy();

        return redirect()->route('site.index');
    }
}
