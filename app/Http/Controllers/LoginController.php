<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function Login()
    {
        return view('stockedu');
    }

    public function Entrar(Request $request)
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100'],
        ]);

        $usuario = DB::table('usuario_acesso')
            ->where('email', $dados['email'])
            ->first();
        $agora = now('America/Sao_Paulo');

        if ($usuario) {
            DB::table('usuario_acesso')
                ->where('id_acesso', $usuario->id_acesso)
                ->update([
                    'nome' => $dados['nome'],
                    'updated_at' => $agora,
                ]);
        } else {
            DB::table('usuario_acesso')->insert([
                'nome' => $dados['nome'],
                'email' => $dados['email'],
                'created_at' => $agora,
                'updated_at' => $agora,
            ]);
        }

        $request->session()->put([
            'usuario_nome' => $dados['nome'],
            'usuario_email' => $dados['email'],
        ]);

        return redirect()->route('Dashboard');
    }
}
