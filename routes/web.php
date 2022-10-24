<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


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
    return view('admin.dashboard');
});
/*=================== MATERIAL =============== */
Route::resources([
    'materials' => MaterialController::class,
    'compras' => CompraController::class,
    'requisicaos' => RequisicaoController::class,
    'categorias' => CategoriaController::class,
    'users' => UserController::class
]);
Route::get('reports',[ReportController::class, 'create'])->name('reports');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
