<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelatorioController extends Controller
{
    public function Index()
    {
        $relatorios = DB::table('relatorio')
            ->orderByDesc('created_at')
            ->get();

        return view('graficos', compact('relatorios'));
    }

    public function Salvar(Request $request)
    {
        $dados = $request->validate([
            'titulo' => ['required', 'string', 'max:150'],
            'conteudo' => ['required', 'string', 'max:20000'],
        ]);

        $agora = now('America/Sao_Paulo');

        DB::table('relatorio')->insert([
            'titulo' => $dados['titulo'],
            'conteudo' => $dados['conteudo'],
            'autor_nome' => $request->session()->get('usuario_nome'),
            'autor_email' => $request->session()->get('usuario_email'),
            'created_at' => $agora,
            'updated_at' => $agora,
        ]);

        return redirect()
            ->route('Graficos')
            ->with('status', 'Relatório salvo com sucesso.');
    }
}
