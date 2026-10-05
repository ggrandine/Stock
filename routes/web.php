<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MovimentacaoController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('stockedu');
})->name('home');
Route::get('/Login', [LoginController::class, 'Login'])->name('Login');
Route::post('/login', [LoginController::class, 'Entrar'])->name('Login.submit');
Route::get('/Dashboard', [DashboardController::class, 'Dashboard'])->name('Dashboard');
Route::get('/Materiais', [MaterialController::class, 'Index'])->name('Materiais');
Route::get('/CadastroMaterial', [MaterialController::class, 'CadastroController'])->name('CadastroMaterial');
Route::post('/CadastroMaterial', [MaterialController::class, 'Cadastrar'])->name('CadastrarMaterial');
Route::get('/AlterarMaterial/{id}', [MaterialController::class, 'AlterarController'])->name('AlterarMaterial');
Route::get('/DeletarMaterial/{id}', [MaterialController::class, 'DeletarController'])->name('DeletarMaterial');
Route::delete('/DeletarMaterial/{id}', [MaterialController::class, 'Deletar'])->name('ExcluirMaterial');
Route::get('/Movimentacoes', [MovimentacaoController::class, 'Index'])->name('Movimentacoes');
Route::get('/CadastroMovimentacao', [MovimentacaoController::class, 'CadastroController'])->name('CadastroMovimentacao');
Route::get('/CadastroUsuario', [UsuarioController::class, 'Index'])->name('CadastroUsuario');
Route::get('/Graficos', [RelatorioController::class, 'Index'])->name('Graficos');
Route::post('/Graficos', [RelatorioController::class, 'Salvar'])->name('SalvarRelatorio');
Route::view('/Configuracoes', 'configuracoes')->name('Configuracoes');
