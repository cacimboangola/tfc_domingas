<?php

use App\Http\Controllers\ReportController;

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
*/ Route::get('/', function () {
    return view('auth.login');
});
Route::group(['middleware'=>['auth'], 'prefix'=> 'admin'],function() {

    Route::resources([
        'materials' => MaterialController::class,
        'compras' => CompraController::class,
        'requisicaos' => RequisicaoController::class,
        'categorias' => CategoriaController::class
    ]);
    Route::resource('users',UserController::class)->middleware('admin');
    Route::get('reports', [ReportController::class, 'create'])->name('reports');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
