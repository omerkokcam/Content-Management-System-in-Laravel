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

Auth::routes();
Route::get('/exit', function (){\Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('login');
})->name('log_out');

Route::get('/', 'Front\homeController@index')->name('main');
Route::get('/archive', 'Front\newsController@index')->name('Front.archive.index');
Route::get('/archive/{id}', 'Front\newsController@view')->name('Front.archive.view');
Route::get('/page/{id}', 'Front\homeController@page')->name('Front.page');
Route::get('/spage/{id}', 'Front\homeController@spage')->name('Front.spage');
Route::get('/album/{id}','Front\albumsController@album_detail')->name('Front.album.detail');


Route::group(['prefix' => 'panel', 'middleware' => 'auth'], function (){
   Route::get('/', function (){
       return view('CMS.home');})->name('CMS.home');

   Route::group(['prefix' => 'menu'], function (){
      Route::get('/', 'CMS\menusController@index')->name('CMS.menus.list');
      Route::get('/create', 'CMS\menusController@create')->name('CMS.menus.create');
      Route::post('/create_post', 'CMS\menusController@create_post')->name('CMS.menus.create_post');
      Route::get('/createsub', 'CMS\menusController@createSub')->name('CMS.menus.createsub');
      Route::post('/createsub_post', 'CMS\menusController@createSub_post')->name('CMS.menus.createsub_post');
      Route::get('/remove/{id}', 'CMS\menusController@remove')->name('CMS.menus.remove');
      Route::get('/remove_subs/{id}', 'CMS\menusController@remove_subs')->name('CMS.menus.remove_subs');
      Route::get('/edit/{id}', 'CMS\menusController@edit')->name('CMS.menus.edit');
      Route::post('/edit_post/{id}', 'CMS\menusController@edit_post')->name('CMS.menus.edit_post');
      Route::get('/editsubs/{id}', 'CMS\menusController@editSubs')->name('CMS.menus.editsubs');
      Route::post('/editsubs_post/{id}', 'CMS\menusController@editSubs_post')->name('CMS.menus.editSubs_post');
   });

   Route::group(['prefix' => 'news'], function (){
      Route::get('/', 'CMS\newsController@index')->name('CMS.news.list');
      Route::get('/create', 'CMS\newsController@create')->name('CMS.news.create');
      Route::post('/create_post', 'CMS\newsController@create_post')->name('CMS.news.create_post');
      Route::get('/remove/{id}', 'CMS\newsController@remove')->name('CMS.news.remove');
      Route::get('/edit/{id}', 'CMS\newsController@edit')->name('CMS.news.edit');
      Route::post('/edit/{id}', 'CMS\newsController@edit_post')->name('CMS.news.edit_post');
   });

   Route::group(['prefix'=>'albums'], function () {
      Route::get('/','CMS\albumsController@index')->name('CMS.albums.list');
      Route::get('/create','CMS\albumsController@create')->name('CMS.albums.create');
      Route::post('/create_album','CMS\albumsController@create_album')->name('CMS.albums.create_album');
      Route::get('/edit/{id}','CMS\albumsController@edit')->name('CMS.albums.edit');
      Route::post('/edit_album/{id}','CMS\albumsController@edit_album')->name('CMS.albums.edit_album');
      Route::get('/delete_album/{id}','CMS\albumsController@delete_album')->name('CMS.albums.delete_album');
      Route::get('/create_photo','CMS\albumsController@create_photo_screen')->name('CMS.albums.create_photo_screen');
      Route::post('/create_photo','CMS\albumsController@create_photo')->name('CMS.albums.create_photo');
      Route::get('/edit_photo/{id}','CMS\albumsController@edit_photo_screen')->name('CMS.albums.edit_photo_screen');
      Route::post('/edit_photo/{id}','CMS\albumsController@edit_photo')->name('CMS.albums.edit_photo');
       Route::get('/delete_photo/{id}','CMS\albumsController@delete_photo')->name('CMS.albums.delete_photo');
   });

});