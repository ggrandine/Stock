<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
    public function Index()
    {
        $materiais = DB::table('material')
            ->orderByDesc('id_material')
            ->get();

        return view('materiais.index', compact('materiais'));
    }

    public function CadastroController()
    {
        return view('materiais.create');
    }

    public function Cadastrar(Request $request)
    {
        $validated = $request->validate([
            'nome' => ['required', 'string', 'max:100'],
            'categoria' => ['required', 'string', 'max:50'],
            'quantidade' => ['required', 'integer', 'min:0'],
            'unidade' => ['required', 'string', 'max:20'],
            'estoque_minimo' => ['required', 'integer', 'min:0'],
            'descricao' => ['nullable', 'string', 'max:1000'],
        ]);

        DB::table('material')->insert([
            'nome' => $validated['nome'],
            'categoria' => $validated['categoria'],
            'quantidade' => $validated['quantidade'],
            'unidade' => $validated['unidade'],
            'created_at' => Carbon::now('America/Sao_Paulo'),
            'updated_at' => Carbon::now('America/Sao_Paulo'),
        ]);

        return redirect()
            ->route('Materiais')
            ->with('status', 'Material cadastrado. A estrutura atual do banco não armazena estoque mínimo nem descrição.');
    }

    public function AlterarController($id)
    {
        return view('materiais.edit', compact('id'));
    }

    public function DeletarController($id)
    {
        $material = DB::table('material')
            ->where('id_material', $id)
            ->first();

        abort_if(! $material, 404);

        return view('materiais.delete', compact('material'));
    }

    public function Deletar($id)
    {
        $material = DB::table('material')
            ->where('id_material', $id)
            ->first();

        abort_if(! $material, 404);

        $possuiMovimentacoes = DB::table('movimentacao')
            ->where('id_material', $id)
            ->exists();
        $possuiLog = DB::table('log_estoque')
            ->where('id_material', $id)
            ->exists();

        if ($possuiMovimentacoes || $possuiLog) {
            return redirect()
                ->route('DeletarMaterial', $id)
                ->with('error', 'Este material possui histórico de estoque e não pode ser excluído.');
        }

        DB::table('material')
            ->where('id_material', $id)
            ->delete();

        return redirect()
            ->route('Materiais')
            ->with('status', 'Material excluído com sucesso.');
    }
}
