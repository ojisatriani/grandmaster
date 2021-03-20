<?php

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
|
*/
Route::get('ojisatriani/{folder}/{file}', 'jsController@backend');
Route::get('ojisatriani/{folder}/{id}/{file}', 'jsController@backendWithId');

Route::get('/home', 'berandaController@index')->name('beranda.home');
Route::group(['prefix' => config('master.url.admin')], function () {
	// dashboard - beranda
	Route::get('/', 'berandaController@index')->name('beranda.index');
	
	//user ubah password
	Route::get('user/ubahpassword/{id}', 'userController@ubahpassword')->name('user.ubahpassword');
	Route::group(['middleware' => ['throttle:10']], function () {
		Route::post('user/ubahpassword', 'userController@resetpassword')->name('user.store_ubahpassword');
	});
	Route::group(['middleware' => ['aksesmenu']], function (){

		//user
		Route::get('user/hapus/{id}', 'userController@hapus')->name('user.hapus');
		Route::get('user/data', 'userController@data')->name('user.data');
		Route::resource('user', 'userController');
		
		//menu
		Route::get('menu/hapus/{id}', 'menuController@hapus')->name('menu.hapus');
		Route::get('menu/data', 'menuController@data')->name('menu.data');
		Route::resource('menu', 'menuController');

		//submenu
		Route::get('submenu/hapus/{id}', 'submenuController@hapus')->name('submenu.hapus');
		Route::get('submenu/data/{id}', 'submenuController@data')->name('submenu.data');
		Route::resource('submenu', 'submenuController');

		//aksesgrup
		Route::get('aksesgrup/hapus/{id}', 'aksesgrupController@hapus')->name('aksesgrup.hapus');
		Route::get('aksesgrup/data', 'aksesgrupController@data')->name('aksesgrup.data');
		Route::get('aksesgrup/detail/data/{id}', 'aksesgrupController@data_detail')->name('aksesgrup.data_detail');
		Route::resource('aksesgrup', 'aksesgrupController');

		//aksesmenu
		Route::get('aksesmenu/data/{id}', 'aksesmenuController@data')->name('aksesmenu.data');
		Route::get('aksesmenu/create/{id}', 'aksesmenuController@create')->name('aksesmenu.create_id');
		Route::resource('aksesmenu', 'aksesmenuController');
		
		//perbaikan
		Route::get('perbaikan/data/{id}', 'perbaikanController@data')->name('perbaikan.data');
		Route::get('perbaikan/hapus/{id}', 'perbaikanController@hapus')->name('perbaikan.hapus');
		Route::get('perbaikan/create/{id}', 'perbaikanController@create')->name('perbaikan.create_id');
		Route::resource('perbaikan', 'perbaikanController');

		//berkas
		Route::get('berkas/hapus/{id}', 'berkasController@hapus')->name('berkas.hapus');
		Route::get('berkas/data', 'berkasController@data')->name('berkas.data');
		Route::get('berkas/download/{id}/{nama}', 'berkasController@download')->name('berkas.download');
		Route::resource('berkas', 'berkasController');

	});
});
