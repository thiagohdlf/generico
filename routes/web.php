<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    PerfilController,
    PermissaoController,
    UserController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/admin')->middleware(['auth'])->name('admin.')->group(function(){
    //Página Admin principal
    Route::get('/', function(){
        return view('admin.paginas.admin');
    })->name('home')->middleware(['can:admin']);
    //

    //Página de Permissões
    Route::get('/permissao', [PermissaoController::class, 'index'])->name('permissao.index');
    Route::get('/permissao/criar', [PermissaoController::class, 'criar'])->name('permissao.criar');
    Route::post('/permissao', [PermissaoController::class, 'salvar'])->name('permissao.salvar');
    Route::get('/permissao/{id}', [PermissaoController::class, 'mostrar'])->name('permissao.mostrar');
    Route::get('/permissao/{id}/editar', [PermissaoController::class, 'editar'])->name('permissao.editar');
    Route::put('/permissao/{id}', [PermissaoController::class, 'atualizar'])->name('permissao.atualizar');
    Route::delete('/permissao/{id}', [PermissaoController::class, 'deletar'])->name('permissao.deletar');
    //

    //Página de Perfis
    Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.index');
    Route::get('/perfil/criar', [PerfilController::class, 'criar'])->name('perfil.criar');
    Route::post('/perfil', [PerfilController::class, 'salvar'])->name('perfil.salvar');
    Route::get('/perfil/{id}', [PerfilController::class, 'mostrar'])->name('perfil.mostrar');
    Route::get('/perfil/{id}/editar', [PerfilController::class, 'editar'])->name('perfil.editar');
    Route::put('/perfil/{id}', [PerfilController::class, 'atualizar'])->name('perfil.atualizar');
    Route::delete('/perfil/{id}', [PerfilController::class, 'deletar'])->name('perfil.deletar');
    //

    //Página atribui permissão ao perfil
    Route::get('/perfil/permissao/{id}', [PerfilController::class, 'permissao'])->name('perfil.permissao');
    Route::post('/perfil/permissao/{id}', [PerfilController::class, 'permissaoadd'])->name('perfil.permissao.add');
    Route::get('/perfil/{idPerfil}/permissao/{idPermissao}', [PerfilController::class, 'permissaormv'])->name('perfil.permissao.rmv');
    //

    //Página de User
    Route::get('/usuario', [UserController::class, 'index'])->name('usuario.index');
    Route::get('/usuario/{id}', [UserController::class, 'mostrar'])->name('usuario.mostrar');
    //

    //Páginas atribui perfil ao usuário
    Route::get('/usuario/perfil/{id}', [UserController::class, 'perfil'])->name('usuario.perfil');
    Route::post('/usuario/perfil/{id}', [UserController::class, 'perfiladd'])->name('usuario.perfil.add');
    Route::get('/usuario/{idUser}/perfil/{idPerfil}', [UserController::class, 'perfilrmv'])->name('usuario.perfil.rmv');
    //
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
