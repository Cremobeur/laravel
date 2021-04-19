<?php

use App\Http\Controllers\PropertyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    return view('home');
});

Route::get('/about', function () {
    $name = 'Cremobeur';

    return view('about', [
        'name' => $name,
        'bibis' => [1, 2, 3, 4],
    ]);
});

Route::get('/hello/{nom?}', function ($nom = 'Cremobeur') {
    return "<h1>Hello $nom</h1>";
})->where('nom', '.{2,}'); // Le nom doit faire 2 caractères minimum


Route::get('/nos-annonces', [PropertyController::class, 'index']);

Route::get('/show/{property}', [PropertyController::class, 'show'])->whereNumber('id');
Route::get('/show/{id}', [PropertyController::class, 'show'])->whereNumber('id');

Route::get('/show/creer', [PropertyController::class, 'create']);

Route::post('/show/creer', [PropertyController::class, 'store']);

Route::get('/show/editer/{id}', [PropertyController::class, 'edit']);
Route::put('/show/editer/{id}', [PropertyController::class, 'update']);

Route::delete('/show/{id}', [PropertyController::class, 'destroy']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
