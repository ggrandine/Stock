<?php
namespace App\Http\Controllers;
class MovimentacaoController extends Controller
{
 public function Index() { return view('movimentacoes.index'); }
 public function CadastroController() { return view('movimentacoes.create'); }
}