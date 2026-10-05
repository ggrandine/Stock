<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function Index()
    {
        $usuarios = DB::table('usuario_acesso')
            ->orderByDesc('updated_at')
            ->get();

        return view('cadastro_usuario', compact('usuarios'));
    }
}
