<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function Dashboard()
    {
        $totalMateriais = DB::table('material')->count();
        $entradasHoje = 0;

        if (Schema::hasColumn('material', 'created_at')) {
            $entradasHoje = DB::table('material')
                ->whereDate('created_at', Carbon::now('America/Sao_Paulo')->toDateString())
                ->count();
        }

        $nome = session('usuario_nome', 'Usuário');
        $email = session('usuario_email', '');
        $partesNome = preg_split('/\s+/', trim($nome), -1, PREG_SPLIT_NO_EMPTY);
        $iniciais = collect($partesNome)
            ->take(2)
            ->map(fn ($parte) => mb_strtoupper(mb_substr($parte, 0, 1)))
            ->implode('');

        return view('dashboard', compact('nome', 'email', 'iniciais', 'totalMateriais', 'entradasHoje'));
    }
}
