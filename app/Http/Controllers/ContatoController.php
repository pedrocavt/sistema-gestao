<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {   
        $motivo_contato = MotivoContato::all();

        return view('site.contato', ['motivo_contato' => $motivo_contato]);
    }

    public function salvar(Request $request)
    {   
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos', //minimo 3, maximo 40 e verifica se já há um nome igual no formulário
            'telefone' => 'required',
            'email' => 'required|email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'required' => 'O campo :attribute precisa ser preenchido',
            
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
            'nome.unique' => 'Nome já em uso',

            'email.email' => 'Email inválido',

            'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres'
        ];

        //validar os dados do formulário
        $request->validate($regras, $feedback);

        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}
