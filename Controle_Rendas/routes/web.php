<?php

use Illuminate\Support\Facades\Route;
use App\Mail\TesteMensagemEmail;

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

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('inclino/pesquisar','App\Http\Controllers\InclinoController@pesquisar')->middleware(['auth', 'verified'])->name('inclino.pesquisar');
Route::post('inclino/pesquisar','App\Http\Controllers\InclinoController@resultado_pesquisa')->middleware(['auth', 'verified'])->name('inclino.pesquisa');
Route::resource('inclino','App\Http\Controllers\InclinoController')->middleware(['auth', 'verified']);
Route::resource('imovel','App\Http\Controllers\ImovelController')->middleware(['auth', 'verified']);
Route::get('fatura/pesquisar','App\Http\Controllers\FaturaController@pesquisar')->middleware(['auth', 'verified'])->name('fatura.pesquisar');
Route::post('fatura/pesquisar','App\Http\Controllers\FaturaController@resultado_pesquisa')->middleware(['auth', 'verified'])->name('fatura.pesquisa');
Route::get('fatura/exportar/{id_fatura}','App\Http\Controllers\FaturaController@exportar')->middleware(['auth', 'verified'])->name('fatura.exportar');
Route::resource('fatura','App\Http\Controllers\FaturaController')->middleware(['auth', 'verified']);








Route::get('/teste',function(){
    return new TesteMensagemEmail();
} )->name('teste');
