<?php

/*dddeee
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HotController@index');
Route::get('login', 'HotController@login');
Route::get('weibolist', 'HotController@weibolist');
Route::get('wx', 'WeixinController@valid');

Route::group(array('prefix' => 'admin'), function() {
    Route::get('user','Admin\UsersController@index');
    Route::get('signout','Admin\UsersController@signout');
    Route::get('register','Admin\UsersController@register');
    Route::post('save','Admin\UsersController@save');
    Route::match(['get', 'post'],'login','Admin\UsersController@login');
    Route::get('pic','Admin\UsersController@piclist');
    Route::get('editshow','Admin\UsersController@editshow');
    Route::post('picsave','Admin\UsersController@picsave');
    Route::get('picdelete/{id}','Admin\UsersController@picdelete');
    Route::get('piccontent/{id}','Admin\UsersController@piccontent');
    Route::get('sendmail/{id}','Admin\UsersController@sendmail');
});
