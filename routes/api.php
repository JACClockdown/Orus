<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});


Route::group(['middleware' => ['jwt']], function () {

    Route::get('templates', 'TemplatesController@index')->name('template.index');

    Route::post('template', 'TemplatesController@store')->name('template.store');

    Route::put('template/{template_id}', 'TemplatesController@update')->name('template.update');

    Route::delete('template/{template_id}', 'TemplatesController@destroy')->name('template.destroy');

    Route::get('clients','ClientsController@index')->name('clients.index');
    Route::post('client','ClientsController@store')->name('clients.store');
    Route::put('clients/{client_id}', 'ClientsController@update')->name('clients.update');
    Route::delete('clients/{client_id}', 'ClientsController@destroy')->name('clients.destroy');

});