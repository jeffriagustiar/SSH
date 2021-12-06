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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'DashboardController@index')->name('dashboard');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/profile', 'HomeController@profile')->name('home-profile');
Route::post('/home/profile/{id}', 'HomeController@profileEdit')->name('home-profile-edit');

Route::get('/ssh','SshController@index')->name('data-ssh');
Route::post('/importssh', 'SshController@importSsh')->name('importSsh');
Route::delete('/ssh/{id}', 'SshController@destroy')->name('ssh-delete');
Route::get('/ssh/decision','SshController@decision')->name('data-keputusan');
Route::post('/ssh/decision/{id}','SshController@terimaSsh')->name('data-ssh-add');
Route::post('/ssh/decision/msg','SshController@terimaSsh')->name('data-ssh-pesan');

// Route::post('/importssh', 'HomeController@importSsh')->name('importSsh');

Route::get('/regis', 'RegisterController@create')->name('regis');

Auth::routes();

