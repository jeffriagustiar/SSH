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

Route::group(['middleware' => ['auth']],function(){
    
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/profile', 'HomeController@profile')->name('home-profile');
    Route::post('/home/profile/{id}', 'HomeController@profileEdit')->name('home-profile-edit');

    //SSH
    Route::get('/ssh','SshController@index')->name('data-ssh');
    Route::get('/ssh/sah','SshController@sshSahUser')->name('data-ssh-sah-user');
    Route::post('/importssh', 'SshController@importSsh')->name('importSsh');
    Route::delete('/ssh/{id}', 'SshController@destroy')->name('ssh-delete');
    Route::get('/ssh/decision','SshController@decision')->name('data-keputusan');
    Route::post('/ssh/decision/simpan','SshController@terimaSsh')->name('data-ssh-add');
    Route::get('/ssh/decision/add/{id}','SshController@sshDA')->name('data-ssh-add-d');
    Route::get('/ssh/decision/list/sah','SshController@listSahSsh')->name('data-ssh-sah');
    Route::get('/ssh/decision/list/sah/{id}','SshController@sshBatal')->name('data-ssh-batal');
    Route::get('/ssh/download','SshController@sshDownload')->name('data-ssh-download');
    Route::post('/ssh/download/templete','SshController@sshTemplete')->name('ssh-download-templete');

    //SBU
    Route::get('/sbu','SbuController@index')->name('data-sbu');
    Route::get('/sbu/sah','SbuController@sbuSahUser')->name('data-sbu-sah-user');
    Route::post('/importsbu', 'SbuController@importSbu')->name('importSbu');
    Route::delete('/sbu/{id}', 'SbuController@destroy')->name('sbu-delete');
    Route::get('/sbu/decision','SbuController@decision')->name('data-keputusan-sbu');
    Route::post('/sbu/decision/simpan','SbuController@terimaSbu')->name('data-sbu-add');
    Route::get('/sbu/decision/add/{id}','SbuController@sbuDA')->name('data-sbu-add-d');
    Route::get('/sbu/decision/list/sah','SbuController@listSahSbu')->name('data-sbu-sah');
    Route::get('/sbu/decision/list/sah/{id}','SbuController@sbuBatal')->name('data-sbu-batal');
    Route::get('/sbu/download','SbuController@sbuDownload')->name('data-sbu-download');
    Route::post('/sbu/download/templete','SbuController@sbuTemplete')->name('sbu-download-templete');

});    
// Route::post('/ssh/decision/msg','SshController@terimaSsh')->name('data-ssh-pesan'); //belum

// Route::post('/importssh', 'HomeController@importSsh')->name('importSsh');

Route::get('/regis', 'RegisterController@create')->name('regis');

Auth::routes();

