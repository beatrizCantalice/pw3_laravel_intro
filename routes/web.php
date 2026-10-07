<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\LivroController;
use App\Models\User;

// Painel Administrativo (Listagem de Usuários via Controller)
Route::get('/admin', [UserController::class, 'index']);

// Rotas de Criação de Usuários
Route::get('/usuarios/novo', [UserController::class, 'create']);
Route::post('/usuarios', [UserController::class, 'store']);

// Rotas de Edição e Atualização de Usuários
Route::get('/usuarios/{id}/editar', [UserController::class, 'edit']);
Route::put('/usuarios/{id}', [UserController::class, 'update']);

// Rotas da Agenda de Eventos
Route::get('/eventos', [EventoController::class, 'index']);
Route::get('/eventos/novo', [EventoController::class, 'create']);
Route::post('/eventos', [EventoController::class, 'store']);

// Outras rotas do sistema
Route::get('/teste-orm', function () {
    return view('home');
});

Route::view('/landing', 'landing');

Route::get('/teste-orm-create', function (){
    User::create([
        'name' => 'Ana Clara Santos',
        'email' => 'ana2.santos@escola.sp.gov.br',
        'password' => bcrypt('12345678') // Dica: use bcrypt para senhas se for testar login depois
    ]);

    return User::all();
});

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::post('/produtos', [ProdutoController::class, 'store']);

Route::get('/livros', [LivroController::class, 'index']);
Route::post('/livros', [LivroController::class, 'store']);