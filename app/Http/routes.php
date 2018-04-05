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

Route::group(array('prefix' => 'admin'), function() {
    Route::get('user','Admin\UsersController@index');
    Route::get('register','Admin\UsersController@register');
    Route::post('save','Admin\UsersController@save');
});
