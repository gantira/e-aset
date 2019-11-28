<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('404', 'HomeController@error');

Route::post('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');

Route::post('registrasi', 'UserController@store');
Route::get('aktivasi/{email}/{str}', 'UserController@aktivasi');

Route::post('/chat/send', 'ChatController@store');

Route::group(['middleware' => 'auth'], function() {

	Route::get('dashboard', 'DashboardController@index');

	Route::get('profile/edit', 'ProfileController@edit');
	Route::patch('profile/update/{id}', 'ProfileController@update');
		
	Route::get('kiba', 'KibaController@index');
	
	Route::get('kiba/delete/{id}', 'KibaController@destroy');
	Route::get('kiba/create', 'KibaController@create');
	Route::post('kiba', 'KibaController@store');
	Route::get('kiba/edit/{id}', 'KibaController@edit');
	Route::patch('kiba/update/{id}', 'KibaController@update');
	Route::post('kiba/upload', 'KibaController@upload');
	Route::post('kiba/view', 'KibaController@view');

	Route::get('kibb', 'KibbController@index');
	Route::get('kibb/delete/{id}', 'KibbController@destroy');
	Route::get('kibb/create', 'KibbController@create');
	Route::post('kibb', 'KibbController@store');
	Route::get('kibb/edit/{id}', 'KibbController@edit');
	Route::patch('kibb/update/{id}', 'KibbController@update');
	Route::post('kibb/upload', 'KibbController@upload');
	Route::post('kibb/view', 'KibbController@view');

	Route::get('kibc', 'KibcController@index');
	Route::get('kibc/delete/{id}', 'KibcController@destroy');
	Route::get('kibc/create', 'KibcController@create');
	Route::post('kibc', 'KibcController@store');
	Route::get('kibc/edit/{id}', 'KibcController@edit');
	Route::patch('kibc/update/{id}', 'KibcController@update');
	Route::post('kibc/upload', 'KibcController@upload');
	Route::post('kibc/view', 'KibcController@view');

	Route::get('perpustakaan', 'PerpustakaanController@index');
	Route::get('perpustakaan/delete/{id}', 'PerpustakaanController@destroy');
	Route::get('perpustakaan/create', 'PerpustakaanController@create');
	Route::post('perpustakaan', 'PerpustakaanController@store');
	Route::get('perpustakaan/edit/{id}', 'PerpustakaanController@edit');
	Route::patch('perpustakaan/update/{id}', 'PerpustakaanController@update');
	Route::post('perpustakaan/upload', 'PerpustakaanController@upload');
	Route::post('perpustakaan/view', 'PerpustakaanController@view');

	Route::get('tumbuhanhewan', 'TumbuhanHewanController@index');
	Route::get('tumbuhanhewan/delete/{id}', 'TumbuhanHewanController@destroy');
	Route::get('tumbuhanhewan/create', 'TumbuhanHewanController@create');
	Route::post('tumbuhanhewan', 'TumbuhanHewanController@store');
	Route::get('tumbuhanhewan/edit/{id}', 'TumbuhanHewanController@edit');
	Route::patch('tumbuhanhewan/update/{id}', 'TumbuhanHewanController@update');
	Route::post('tumbuhanhewan/upload', 'TumbuhanHewanController@upload');
	Route::post('tumbuhanhewan/view', 'TumbuhanHewanController@view');

	Route::get('kesenian', 'KesenianController@index');
	Route::get('kesenian/delete/{id}', 'KesenianController@destroy');
	Route::get('kesenian/create', 'KesenianController@create');
	Route::post('kesenian', 'KesenianController@store');
	Route::get('kesenian/edit/{id}', 'KesenianController@edit');
	Route::patch('kesenian/update/{id}', 'KesenianController@update');
	Route::post('kesenian/upload', 'KesenianController@upload');
	Route::post('kesenian/view', 'KesenianController@view');

	Route::get('sertifikat', 'SertifikatController@index');
	Route::post('sertifikat', 'SertifikatController@store');
	Route::get('sertifikat/edit/{id}', 'SertifikatController@edit');
	Route::patch('sertifikat/update/{id}', 'SertifikatController@update');
	Route::get('sertifikat/delete/{id}', 'SertifikatController@destroy');

	// Admin

	Route::get('admin/laporan', 'LaporanController@index');
	Route::post('admin/laporan', 'LaporanController@laporan');
	Route::get('admin/laporan/{id}/{periode}/{tahun}', 'LaporanController@laporan_detail');
	Route::get('admin/laporan/kiba', 'LaporanController@kiba');
	Route::get('admin/laporan/kibb', 'LaporanController@kibb');
	Route::get('admin/laporan/kibc', 'LaporanController@kibc');
	Route::get('admin/laporan/perpustakaan', 'LaporanController@perpustakaan');
	Route::get('admin/laporan/kesenian', 'LaporanController@kesenian');
	Route::get('admin/laporan/tumbuhanhewan', 'LaporanController@tumbuhanhewan');

	Route::get('admin/dashboard', 'DashboardController@indexAdmin');

	Route::get('admin/kiba', 'KibaController@indexAdmin');
	Route::get('admin/kiba/status/{acc}/{id}', 'KibaController@status');
	Route::post('admin/kiba/getData', 'KibaController@getData');
	Route::post('admin/kiba/ignore', 'KibaController@ignore');
	Route::get('admin/kiba/needapprove/{id}', 'KibaController@needapprove');

	Route::get('admin/kibb', 'KibbController@indexAdmin');
	Route::get('admin/kibb/status/{acc}/{id}', 'KibbController@status');
	Route::post('admin/kibb/getData', 'KibbController@getData');
	Route::post('admin/kibb/ignore', 'KibbController@ignore');
	Route::get('admin/kibb/needapprove/{id}', 'KibbController@needapprove');

	Route::get('admin/kibc', 'KibcController@indexAdmin');
	Route::get('admin/kibc/status/{acc}/{id}', 'KibcController@status');
	Route::post('admin/kibc/getData', 'KibcController@getData');
	Route::post('admin/kibc/ignore', 'KibcController@ignore');
	Route::get('admin/kibc/needapprove/{id}', 'KibcController@needapprove');

	Route::get('admin/perpustakaan', 'PerpustakaanController@indexAdmin');
	Route::get('admin/perpustakaan/status/{acc}/{id}', 'PerpustakaanController@status');
	Route::post('admin/perpustakaan/getData', 'PerpustakaanController@getData');
	Route::post('admin/perpustakaan/ignore', 'PerpustakaanController@ignore');
	Route::get('admin/perpustakaan/needapprove/{id}', 'PerpustakaanController@needapprove');

	Route::get('admin/tumbuhanhewan', 'TumbuhanHewanController@indexAdmin');
	Route::get('admin/tumbuhanhewan/status/{acc}/{id}', 'TumbuhanHewanController@status');
	Route::post('admin/tumbuhanhewan/getData', 'TumbuhanHewanController@getData');
	Route::post('admin/tumbuhanhewan/ignore', 'TumbuhanHewanController@ignore');
	Route::get('admin/tumbuhanhewan/needapprove/{id}', 'TumbuhanHewanController@needapprove');

	Route::get('admin/kesenian', 'KesenianController@indexAdmin');
	Route::get('admin/kesenian/status/{acc}/{id}', 'KesenianController@status');
	Route::post('admin/kesenian/getData', 'KesenianController@getData');
	Route::post('admin/kesenian/ignore', 'KesenianController@ignore');
	Route::get('admin/kesenian/needapprove/{id}', 'KesenianController@needapprove');

	Route::get('admin/arsip', 'ArsipController@index');
	Route::get('admin/arsip/detail/{id}', 'ArsipController@detail');

	Route::get('admin/arsip/{id}', 'UserController@arsip');
	Route::get('admin/user', 'UserController@index');
	Route::get('admin/user/acc/{id}', 'UserController@approve');
	Route::get('admin/user/accall', 'UserController@accall');

	Route::get('admin/setting', 'SettingController@index');
	Route::patch('admin/setting/{id}', 'SettingController@update');

	Route::get('admin/sertifikat', 'SertifikatController@indexAdmin');

});