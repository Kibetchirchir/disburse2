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
    return view('home');
});
//Route::get('/', function () {
//    return view('welcome');
//});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin/verify/{token}', [
    'as'   => 'verifyClient',
    'uses' => 'TokenAuthorization@VerifyToken'
]);

Route::get('/disburse', function () {
    return view('disburse');
});
/**
 * second step uploading
 */
/**
 *upload
 */
Route::post('/uploadbeneficiaries', [
    'as' => 'addBeneficiaries',
    'uses' => 'Usercontroler@createNewBeneficiaries',
]);

Route::post('/disburseStep2', [
    'as' => 'disburseStep2',
    'uses' => 'Usercontroler@disburseStep2',
]);

Route::get('/test/{batchNo}', function () {
    return 123;
})->name('disburse');
/**
 * Disbursing
 */
Route::post('/disburse', [
    'as' => 'disburse',
    'uses' => 'Disburse@disburse',
]);
