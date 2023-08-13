<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\PaginasController@home');
Route::get('/sobre', 'App\Http\Controllers\PaginasController@sobre');
Route::get('/sobre/like/{id}', 'App\Http\Controllers\PaginasController@likedSobre');
Route::get('/fazer/inscricao/{ensino}/{colegio?}/{classe?}/{curso?}', 'App\Http\Controllers\PaginasController@inscrever');
Route::get('/curso/{curso}', 'App\Http\Controllers\PaginasController@aboutCurso');
Route::get('/noticias', 'App\Http\Controllers\PaginasController@noticias');
Route::get('/noticia/{id}/ler', 'App\Http\Controllers\PaginasController@Vernoticias');
Route::get('/nossa/galeria', 'App\Http\Controllers\PaginasController@galeria');
Route::get('/nossos/precos', 'App\Http\Controllers\PaginasController@precarios');
Route::get('/contactos', 'App\Http\Controllers\PaginasController@contactos');

Route::post('/enviar/inscricao/{ensino}/{colegio}/{classe}/{curso?}', 'App\Http\Controllers\PaginasController@sendInscrito')->name('Send.Inscricao');
Route::post('/noticia/{id}/comentar', 'App\Http\Controllers\PaginasController@SendComent');
Route::post('/enviar/sugestão/', 'App\Http\Controllers\PaginasController@SendSugest')->name('Send.Sugestao');



