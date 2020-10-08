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

// USER
Route::get('/', 'PagesController@index');
Route::post('/hitung', 'PagesController@bobot')->name('hitung');

// ADMIN
// Route::get('/', function () {
//     return redirect('/login');
// });

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('ketinggian','KetinggianController');
// Route::resource('curah-hujan','CurahHujanController');
Route::resource('suhu-udara','SuhuUdaraController');
Route::resource('ph-tanah','PhTanahController');
Route::resource('naungan','NaunganController');
Route::resource('tekstur-tanah','TeksturTanahController');
Route::resource('bobot','BobotController');

Route::get('logout','\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();