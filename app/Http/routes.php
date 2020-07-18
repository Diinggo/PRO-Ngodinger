<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get ('/','DefaultControl@index');
/* ===============================================
*  Artikel Handling
*  =============================================== */
Route::get ('blog','DefaultControl@blogindex');
Route::get ('blog/category', 'DefaultControl@blogkat');
Route::get ('blog/category/{slug}', 'DefaultControl@blogkategori');
Route::get ('blog/tag/{slug}', 'DefaultControl@blogtag');
Route::get ('blog/{slug}', 'DefaultControl@blogslug');
/* ===============================================
*  Tutorial Handling
*  =============================================== */
Route::get ('tutor','DefaultControl@tutor');
Route::get ('tutor/category','DefaultControl@tutorkat');
Route::get ('tutor/category/{slug}','DefaultControl@tutorkategori');
Route::get ('tutor/tag/{slug}','DefaultControl@tutortag');
Route::get ('tutor/{slug}','DefaultControl@tutorslug');
/* ===============================================
*  Skill Handling
*  =============================================== */
Route::get ('skill','DefaultControl@skill');
Route::get ('skill/category','DefaultControl@skillkat');
Route::get ('skill/category/{slug}','DefaultControl@skillkategori');
Route::get ('skill/tag/{slug}','DefaultControl@skilltag');
Route::get ('skill/postroll',function(){return view('aplikasi.skill.postroll');});
Route::get ('skill/{slug}','DefaultControl@skillslug');
/* ==============================================
*  Native Dan Framework Homepage
*  ============================================== */
Route::get ('native','DefaultControl@native');
Route::get ('native/{nama}','DefaultControl@nativenama');
Route::get ('native/{nama}/{slug}','DefaultControl@nativeslug');
Route::get ('framework','DefaultControl@frame');
Route::get ('framework/{nama}','DefaultControl@framenama');
Route::get ('framework/{nama}/{slug}','DefaultControl@frameslug');
/*
* ===============================================
* Admin Page Handling
* ===============================================
*/
// Route::group (['middleware' => ['auth']], function(){
	Route::get ('admin', 'HomeController@admin');
// });
// Route::group( ['middleware' => ['auth','admin']], function(){
	Route::get ('admin', 'HomeController@index');
	Route::group(['prefix' => 'admin'], function () {
		// Viewer Dan Gallery
    	Route::get ('gallery', 'HomeController@gallery');
    	Route::get ('viewer', 'HomeController@viewer');
    	Route::get ('viewer/{id}', 'HomeController@viewerid');

		// Route Resource
    	Route::resource('blog','blogcontrol');
    	Route::resource('tutor','tutorcontrol');
    	Route::resource('skill','skillcontrol');
		Route::resource('blogkategori','blogkategoricontrol');
		Route::resource('tutorkategori','tutorkategoricontrol');
		Route::resource('skillkategori','skillkategoricontrol');
		// Route Setting
		Route::resource('setting','settingcontrol');
		Route::resource('user','usercontrol');
		Route::get  ('edit/{id}','aplikasicontrol@edit');
		Route::post ('edit/{id}','aplikasicontrol@pedit');
		Route::get  ('pass/{id}','aplikasicontrol@pass');
		Route::post ('pass/{id}','aplikasicontrol@ppass');

    	/**-- Route Aplikasi --**/
    	Route::get 	('app','aplikasicontrol@index');
    	Route::get  ('app/new','aplikasicontrol@getnewapp');
    	Route::post ('app/new','aplikasicontrol@postnewapp');
    	Route::get  ('app/edit/{id}','aplikasicontrol@geteditapp');
    	Route::post ('app/edit/{id}','aplikasicontrol@posteditapp');
    	Route::post ('app/{id}','aplikasicontrol@postdelapp');
    	/**-- Route Konten --*/
    	Route::get  ('app/{id}','aplikasicontrol@konten');
    	// Aplikasi Kategori
    	Route::get  ('app/{id}/newkat','aplikasicontrol@getnewkat');
    	Route::post ('app/{id}/newkat','aplikasicontrol@postnewkat');
    	Route::post ('app/{nm}/delkat/{id}','aplikasicontrol@postdelkat');
    	Route::get  ('app/{id}/editkat/{nm}','aplikasicontrol@geteditkat');
    	Route::post ('app/{id}/editkat/{nm}','aplikasicontrol@posteditkat');
    	// Aplikasi Konten
    	Route::get  ('app/{id}/newkon','aplikasicontrol@getnewkon');
    	Route::post ('app/{id}/newkon','aplikasicontrol@postnewkon');
    	Route::post ('app/{sn}/delkon/{id}','aplikasicontrol@postdelkon');
    	Route::get  ('app/{id}/editkon/{nm}','aplikasicontrol@geteditkon');
    	Route::post ('app/{id}/editkon/{nm}','aplikasicontrol@posteditkon');
    });
// });

/*
* ============================================
* User Page Handling
* ============================================
*/
Route::get('/home', 'HomeController@index');
Route::group (['middleware' => ['auth','user']], function(){
	Route::get ('user', function(){
		return 'Masuk Ke User kaka';
	});
	Route::group(['prefix' => 'home'], function () {
    	Route::get('baru', function () {
        	return 'Error Kawan, terimakasih !';
    	});
	});
});

/*
* ===============================================
* login Page Handling
* ===============================================
*/
// Route::auth();
Route::get ('coder/login', 'Auth\AuthController@getLogin');
Route::post('coder/login', 'Auth\AuthController@postLogin');
Route::get ('logout', 'Auth\AuthController@logout');
Route::get ('coder/register', 'Auth\AuthController@getRegister');
Route::post('coder/register', 'Auth\AuthController@postRegister');
// Route::get ('password/email', 'Auth\PasswordController@getEmail');
// Route::post('password/email', 'Auth\PasswordController@postEmail');
// Route::get ('password/email', 'Auth\PasswordController@getEmail');
// Route::post('password/email', 'Auth\PasswordController@postEmail');

/*
* ==============================================
* About handling
* ==============================================
*/
Route::get ('{slug}','DefaultControl@about');
Route::get ('dev/{slug}','DefaultControl@dev');
Route::get ('author/{slug}','DefaultControl@author');