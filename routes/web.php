<?php

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
/*
Route::get('/', function () {
    return view('login');
});
*/
Route::get('/', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
 * Rutas para CRUD de Empresas
 */
Route::middleware('auth')->group(function() {
    Route::resource('empresas',App\Http\Controllers\EmpresasController::class);
});
/*
 * Rutas para CRUD de Usuarios
 */
Route::middleware('auth')->group(function() {
    Route::resource('usuarios',App\Http\Controllers\UsuariosController::class);
});
/*
 * Rutas para CRUD de Log Actividades
 */
Route::middleware('auth')->group(function() {
    Route::resource('log-actividades',App\Http\Controllers\LogActividadesController::class);
});
/*
 * Rutas para Acciones del drive
 */
Route::middleware('auth')->prefix('home')->group(function() {
    Route::post('drive/viewFile', [App\Http\Controllers\DriveEmpresaController::class, 'viewFile'])->name('viewFile');
    Route::post('drive', [App\Http\Controllers\DriveEmpresaController::class, 'index'])->name('indexDrive');
    Route::post('drive/upload/file', [App\Http\Controllers\DriveEmpresaController::class, 'uploadFile'])->name('uploadDrive');
    Route::post('drive/downloadFile', [App\Http\Controllers\DriveEmpresaController::class, 'downloadFile'])->name('downloadFile');
    Route::delete('drive/deleteFile', [App\Http\Controllers\DriveEmpresaController::class, 'deleteFile'])->name('deleteFile');
    Route::post('drive/makeDirectory', [App\Http\Controllers\DriveEmpresaController::class, 'makeDirectorio'])->name('makeDirectory');
    //Route::resource('drive',App\Http\Controllers\DriveEmpresaController::class);
});
