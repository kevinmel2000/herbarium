<?php

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
    return view('dashboard');
})->middleware('auth');

Auth::routes();
Route::get('/dashboard', 'DashboardController@index');
Route::get('/', 'DashboardController@index');
// Route::get('/system-management/{option}', 'SystemMgmtController@index');
Route::get('/profile', 'ProfileController@index');

Route::get('biotrop-management', 'PictureBiotropController@createpic')->name('biotrop-management.createpic');
Route::post('biotrop-management/picture', 'PictureBiotropController@picture')->name('biotrop-management.picture');

Route::post('user-management/search', 'UserManagementController@search')->name('user-management.search');
Route::resource('user-management', 'UserManagementController');

Route::get('add','AddMoreController@create');
Route::post('add','AddMoreController@store');

//IAS
Route::post('invasive/search', 'InvasiveController@search')->name('invasive.search');
Route::resource('invasive', 'InvasiveController');
Route::get('invasive', 'InvasiveController@index');
Route::patch('invasive/{$id_ias}', 'InvasiveController@update')->name('invasive.update');
Route::get('invasive/index', 'InvasiveController@index')->name('invasive.index');
// Route::post('invasive/store', 'InvasiveController@store')->name('invasive.store');
// Route::get('invasive/create', 'InvasiveController@create')->name('invasive.create');
// Route::get('invasive/show/{id_ias}', 'InvasiveController@show')->name('invasive.show');
// Route::get('invasive/{$id_ias}/edit', 'InvasiveController@edit')->name('invasive.edit');
// Route::delete('invasive/destroy/{$id_ias}', 'InvasiveController@destroy')->name('invasive.destroy');


//WeedHerba
Route::get('herbarium-management/weedherba/show-label/{$id_herba}', 'WeedHerbaController@showlabel')->name('weedherba.showlabel');
Route::resource('herbarium-management/weedherba', 'WeedHerbaController');
Route::get('herbarium-management/weedherba', 'WeedHerbaController@index');
Route::patch('herbarium-management/weedherba/{id_herba}/step2', 'WeedHerbaController@updatestep')->name('weedherba.updatestep');
Route::post('herbarium-management/weedherba/store', 'WeedHerbaController@store')->name('weedherba.store');
Route::post('herbarium-management/weedherba/search', 'WeedHerbaController@search')->name('weedherba.search');
Route::post('herbarium-management/weedherba/createnext', 'WeedHerbaController@createnext')->name('weedherba.createnext');
Route::post('herbarium-management/weedherba/create', 'WeedHerbaController@create')->name('weedherba.create');
Route::get('herbarium-management/weedherba/create/', 'WeedHerbaController@destination')->name('weedherba.destination');
Route::get('herbarium-management/weedherba/create/findProv','WeedHerbaController@findProv');
Route::get('herbarium-management/weedherba/create/findCity','WeedHerbaController@findCity');
Route::get('herbarium-management/weedherba/create/findDists','WeedHerbaController@findDists');
Route::get('herbarium-management/weedherba/index', 'WeedHerbaController@index')->name('weedherba.index');
// Route::get('herbarium-management/weedherba/{$id_collect}', 'WeedHerbaController@cedit')->name('weedherba.cedit');

//ForestHerba
Route::resource('herbarium-management/forestherba', 'ForestHerbaController');
Route::post('herbarium-management/forestherba/create', 'ForestHerbaController@create')->name('forestherba.create');
Route::post('herbarium-management/forestherba/createnext', 'ForestHerbaController@createnext')->name('forestherba.createnext');
Route::get('herbarium-management/forestherba', 'ForestHerbaController@index')->name('forestherba.index');
Route::delete('herbarium-management/forestherba/{id_herba}', 'ForestHerbaController@destroy')->name('forestherba.destroy');
Route::post('herbarium-management/forestherba/store', 'ForestHerbaController@store')->name('forestherba.store');
Route::get('herbarium-management/forestherba/{id_herba}', 'ForestHerbaController@show')->name('forestherba.show');
Route::get('herbarium-management/forestherba/{id_herba}/edit', 'ForestHerbaController@edit')->name('forestherba.edit');
Route::patch('herbarium-management/forestherba/{id_herba}', 'ForestHerbaController@update')->name('forestherba.update');
Route::patch('herbarium-management/forestherba/{id_herba}/step2', 'ForestHerbaController@updatestep')->name('forestherba.updatestep');
Route::get('herbarium-management/forestherba/create/', 'ForestHerbaController@destination')->name('forestherba.destination');
Route::get('herbarium-management/forestherba/create/findProv','ForestHerbaController@findProv');
Route::get('herbarium-management/forestherba/create/findCity','ForestHerbaController@findCity');
Route::get('herbarium-management/forestherba/create/findDists','ForesHherbaController@findDists');

Route::post('herbarium-management/forestherba/search', 'ForestHerbaController@search')->name('forestherba.search');
Route::get('herbarium-management/forestherba/show-label', 'ForestherbaController@showlabel')-> name('forestherba.showlabel');
Route::get('herbarium-management/forestherba/index', 'ForestHerbaController@index')->name('forestherba.index');


//LichenHerba
Route::resource('herbarium-management/lichenherba', 'LichenHerbaController');
Route::get('herbarium-management/lichenherba', 'LichenHerbaController@index');
Route::get('herbarium-management/lichenherba', 'LichenHerbaController@index')->name('lichenherba.index');
Route::delete('herbarium-management/lichenherba/{id_herba}', 'LichenHerbaController@destroy')->name('lichenherba.destroy');
Route::post('herbarium-management/lichenherba/store', 'LichenHerbaController@store')->name('lichenherba.store');
Route::post('herbarium-management/lichenherba/createnext', 'LichenHerbaController@createnext')->name('lichenherba.createnext');
Route::post('herbarium-management/lichenherba/create', 'LichenHerbaController@create')->name('lichenherba.create');
Route::get('herbarium-management/lichenherba/{id_herba}', 'LichenHerbaController@show')->name('lichenherba.show');
Route::get('herbarium-management/lichenherba/{id_herba}/edit', 'LichenHerbaController@edit')->name('lichenherba.edit');
Route::patch('herbarium-management/lichenherba/{id_herba}', 'LichenHerbaController@update')->name('lichenherba.update');
Route::patch('herbarium-management/lichenherba/{id_herba}/step2', 'LichenHerbaController@updatestep')->name('lichenherba.updatestep');
Route::get('herbarium-management/lichenherba/create/', 'LichenHerbaController@destination')->name('lichenherba.destination');
Route::get('herbarium-management/lichenherba/create/findProv','LichenHerbaController@findProv');
Route::get('herbarium-management/lichenherba/create/findCity','LichenHerbaController@findCity');
Route::get('herbarium-management/lichenherba/create/findDists','LichenHerbaController@findDists');
Route::post('herbarium-management/lichenherba/search', 'LichenHerbaController@search')->name('lichenherba.search');


//BriovitasHerba
Route::resource('herbarium-management/briovitasherba', 'BrioHerbaController');
Route::get('herbarium-management/briovitasherba', 'BrioHerbaController@index');
Route::patch('herbarium-management/briovitasherba/{id_herba}/step2', 'BrioHerbaController@updatestep')->name('brioherba.updatestep');
Route::delete('herbarium-management/briovitasherba/{id_herba}', 'BrioHerbaController@destroy')->name('brioherba.destroy');
Route::post('herbarium-management/briovitasherba/search', 'BrioHerbaController@search')->name('brioherba.search');
Route::post('herbarium-management/briovitasherba/createnext', 'BrioHerbaController@createnext')->name('brioherba.createnext');
Route::post('herbarium-management/briovitasherba/store', 'BrioHerbaController@store')->name('brioherba.store');
Route::post('herbarium-management/briovitasherba/create', 'BrioHerbaController@create')->name('brioherba.create');
Route::get('herbarium-management/briovitasherba/{id_herba}', 'BrioHerbaController@show')->name('brioherba.show');
Route::get('herbarium-management/briovitasherba/{id_herba}/edit', 'BrioHerbaController@edit')->name('brioherba.edit');
Route::patch('herbarium-management/briovitasherba/{id_herba}', 'BrioHerbaController@update')->name('brioherba.update');
Route::get('herbarium-management/briovitasherba/show-label', 'BrioHerbaController@showlabel')-> name('brioherba.showlabel');
Route::get('herbarium-management/briovitasherba/create/', 'BrioHerbaController@destination')->name('brioherba.destination');
Route::get('herbarium-management/briovitasherba/create/findProv','BrioHerbaController@findProv');
Route::get('herbarium-management/briovitasherba/create/findCity','BrioHerbaController@findCity');
Route::get('herbarium-management/briovitasherba/create/findDists','BrioHerbaController@findDists');
Route::get('herbarium-management/briovitasherba/index', 'BrioHerbaController@index')->name('brioherba.index');


//View weedherba
Route::resource('view-weedherba', 'WeedViewController');
Route::post('view-weedherba/index', 'WeedViewController@index')->name('dashboard_view.weedView');
Route::post('view-weedherba/search', 'WeedViewController@search')->name('dashboard_view.search');


//View forestherba
Route::resource('view-forestherba', 'ForestViewController');
Route::post('view-forestherba/index', 'ForestViewController@index')->name('dashboard_view.ForestView');
Route::post('view-forestherba/search', 'ForestViewController@search')->name('dashboard_view.search');


//VIew lichenherba
Route::resource('view-lichenherba', 'LichenViewController');
Route::post('view-lichenherba/index', 'LichenViewController@index')->name('dashboard_view.LichenView');
Route::post('view-lichenherba/search', 'LichenViewController@search')->name('dashboard_view.search');

//VIew Brioherba
Route::resource('view-brioherba', 'BrioViewController');
Route::post('view-brioherba/index', 'BrioViewController@index')->name('dashboard_view.BrioView');
Route::post('view-brioherba/search', 'BrioViewController@search')->name('dashboard_view.search');

//VIew IASherba
Route::resource('view-invasive', 'InvasiveViewController');
Route::post('view-invasive/index', 'InvasiveViewController@index')->name('dashboard_view.invasiveView');
Route::post('view-invasive/search', 'InvasiveViewController@search')->name('dashboard_view.search');

//Verification IAS
Route::get('verificationIAS', 'VerifIasController@index')->name('verified_ias.index');
Route::get('verificationIAS/verified', 'VerifIasController@verified')->name('verified_ias.verified');
Route::get('verificationIAS/{id_ias}/view', 'VerifIasController@view')->name('verified_ias.view');
Route::patch('verificationIAS/{id_ias}/verif', 'VerifIasController@verif')->name('verified_ias.verif');

//Verification Weedherba
Route::get('verificationWeedHerba', 'VerifWeedController@index')->name('weedherba.index');
Route::get('verificationWeedHerba/verified', 'VerifWeedController@verified')->name('weedherba.verified');
Route::get('verificationWeedHerba/{id_herba}/view', 'VerifWeedController@view')->name('weedherba.view');
Route::patch('verificationWeedHerba/{id_herba}/verif', 'VerifWeedController@verif')->name('weedherba.verif');

//Verification Briovita
Route::get('verificationBryovitaHerba', 'VerifBrioController@index')->name('brioherba.index');
Route::get('verificationBryovitaHerba/verified', 'VerifBrioController@verified')->name('brioherba.verified');
Route::get('verificationBryovitaHerba/{id_herba}/view', 'VerifBrioController@view')->name('brioherba.view');
Route::patch('verificationBryovitaHerba/{id_herba}/verif', 'VerifBrioController@verif')->name('brioherba.verif');

//Verification Lichen
Route::get('verificationLichenHerba', 'VerifLichenController@index')->name('lichenherba.index');
Route::get('verificationLichenHerba/verified', 'VerifLichenController@verified')->name('lichenherba.verified');
Route::get('verificationLichenHerba/{id_herba}/view', 'VerifLichenController@view')->name('lichenherba.view');
Route::patch('verificationLichenHerba/{id_herba}/verif', 'VerifLichenController@verif')->name('lichenherba.verif');

//Verification Forest
Route::get('verificationForestHerba', 'VerifForestController@index')->name('forestherba.index');
Route::get('verificationForestHerba/verified', 'VerifForestController@verified')->name('forestherba.verified');
Route::get('verificationForestHerba/{id_herba}/view', 'VerifForestController@view')->name('forestherba.view');
Route::patch('verificationForestHerba/{id_herba}/verif', 'VerifForestController@verif')->name('forestherba.verif');

Route::get('avatars/{name}', 'EmployeeManagementController@load');

Route::get('coba', 'WeedHerbaController@coba');



///------------------------------------///
//user

Route::get('/Herbarium&IAS', function () {
    return view('user/home');
});

Route::get('Herbarium&IAS/about', 'UAboutController@index')-> name('about');
Route::get('/Herbarium&IAS', 'UHomeController@index')->name('home');
Route::get('Herbarium&IAS/invasive', 'UInvasiveController@index')->name('invasive');
Route::get('Herbarium&IAS/herbarium/weed', 'UWeedController@index')-> name('weedherbarium');
Route::get('Herbarium&IAS/herbarium/forest', 'UForestController@index')-> name('forestherbarium');
Route::get('Herbarium&IAS/herbarium/liken', 'ULikenController@index')-> name('likenherbarium');
Route::get('Herbarium&IAS/herbarium/briovitas', 'UBriovitasController@index')-> name('briovitasherbarium');
// Datatables
Route::get('Herbarium&IAS/nyoba', 'UNyobaController@index');
//maps
// Route::get('/herbarium/weed/{id_herbarium}', 'WeedController@maps')->name('mapsweed');

//search
Route::post('Herbarium&IAS/herbarium/weed/search', 'UWeedController@search')->name('weedherbarium.search');
Route::post('Herbarium&IAS/herbarium/forest/search', 'UForestController@search')->name('forestherbarium.search');
Route::post('Herbarium&IAS/herbarium/liken/search', 'ULikenController@search')->name('likenherbarium.search');
Route::post('Herbarium&IAS/herbarium/briovitas/search', 'UBriovitasController@search')->name('briovitasherbarium.search');
Route::get('Herbarium&IAS/invasive/search', 'UInvasiveController@search')->name('invasive.search');
