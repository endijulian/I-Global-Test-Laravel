<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function () {

    //user
    Route::get('user', 'ControllerUser@index')->name('user.index');
    Route::post('user/create', 'ControllerUser@create')->name('user.create');

    //departement
    Route::get('departement', 'ControllerDepartement@index')->name('departement.index');
    Route::get('departement/create', 'ControllerDepartement@create')->name('departement.create');
    Route::post('departement/store', 'ControllerDepartement@store')->name('departement.store');
    Route::get('departement/edit/{id}', 'ControllerDepartement@edit')->name('departement.edit');
    Route::put('departement/update/{id}', 'ControllerDepartement@update')->name('departement.update');
    Route::delete('departement/destroy/{id}', 'ControllerDepartement@destroy')->name('departement.destroy');

    //proyek
    Route::get('proyek', 'ControllerProyek@index')->name('proyek.index');
    Route::get('proyek/create', 'ControllerProyek@create')->name('proyek.create');
    Route::post('proyek/store', 'ControllerProyek@store')->name('proyek.store');
    Route::get('proyek/edit/{id}', 'ControllerProyek@edit')->name('proyek.edit');
    Route::put('proyek/update/{id}', 'ControllerProyek@update')->name('proyek.update');
    Route::delete('proyek/destroy/{id}', 'ControllerProyek@destroy')->name('proyek.destroy');


    //karyawan
    Route::get('karyawan', 'ControllerKaryawan@index')->name('karyawan.index');
    Route::get('karyawan/create', 'ControllerKaryawan@create')->name('karyawan.create');
    Route::post('karyawan/store', 'ControllerKaryawan@store')->name('karyawan.store');
    Route::get('karyawan/edit/{id}', 'ControllerKaryawan@edit')->name('karyawan.edit');
    Route::put('karyawan/update/{id}', 'ControllerKaryawan@update')->name('karyawan.update');
    Route::delete('karyawan/destroy/{id}', 'ControllerKaryawan@destroy')->name('karyawan.destroy');
});
