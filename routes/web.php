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

Route::get('/', function () {
    return redirect('login');
});
Route::get('index','App\Http\Controllers\IndexController@index' );
Route::get('register/checkEmail/{email}', "App\Http\Controllers\RegisterController@checkEmail");
Route::get('register/checkUsername/{username}', "App\Http\Controllers\RegisterController@checkUsername");
Route::get('register', 'App\Http\Controllers\RegisterController@register_form')->name('register');;
Route::post('register', 'App\Http\Controllers\RegisterController@do_register');


Route::get('login', 'App\Http\Controllers\LoginController@login_form');
Route::post('login', 'App\Http\Controllers\LoginController@do_login');

Route::get('logout', 'App\Http\Controllers\LogoutController@logout');

Route::get('home', 'App\Http\Controllers\HomeController@home');

Route::get('preferiti', 'App\Http\Controllers\PrefController@preferiti');
Route::get('newPost/api/{type}/{q?}', 'App\Http\Controllers\NewPostController@ricercanewPost');
Route::post('newPost/caricamento', 'App\Http\Controllers\NewPostController@caricamento')->name('docaricamento');
Route::get('newPost', 'App\Http\Controllers\NewPostController@newPost');


Route::get('home/recupera_posts', 'App\Http\Controllers\HomeController@recupera_posts');
Route::post('home/inserisci_like', 'App\Http\Controllers\HomeController@inseriscri_like');
Route::get('home/recupera_like', 'App\Http\Controllers\HomeController@recupera_like');
Route::post('home/elimina_like', 'App\Http\Controllers\HomeController@elimina_like');
Route::get('home/recupera_commenti/{idpost}', 'App\Http\Controllers\HomeController@recupera_commenti');
Route::post('home/inserisci_commento', 'App\Http\Controllers\HomeController@inserisci_commmento'); 

Route::get('home/recupera_preferiti', 'App\Http\Controllers\HomeController@recupera_preferiti');
Route::post('home/inserisci_pref', 'App\Http\Controllers\HomeController@inserisci_pref');

Route::post('home/elimina_pref', 'App\Http\Controllers\HomeController@elimina_pref');

Route::get('preferiti/recupera_postPreferiti', 'App\Http\Controllers\PrefController@recupera_postPref');

Route::get('ricerca','App\Http\Controllers\RicercaController@ricerca' );
Route::get('ricerca/{content}','App\Http\Controllers\RicercaController@dosearch' );

?>