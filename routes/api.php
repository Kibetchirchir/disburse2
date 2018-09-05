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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * admin
 *
 * contacts type
 */


Route::post('/admin/conttype', [
    'as' => 'addContact',
    'uses' => 'AdminController@ContactsType',
]);

/**
 * client type
 */

Route::post('/admin/clienttype', [
    'as' => 'addClient',
    'uses' => 'AdminController@ClientType',
]);

/**
 * documentsType
 */
Route::post('/admin/doctype', [
    'as' => 'adddocuments',
    'uses' => 'AdminController@DocumentsType',
]);
/**
 * the payment mode
 */
Route::post('/admin/modetype', [
    'as' => 'addmode',
    'uses' => 'AdminController@Mode',
]);
/**
 * user-roles
 */

Route::post('/admin/userrole', [
    'as' => 'adduserrole',
    'uses' => 'AdminController@userRoles',
]);
/**
 * client registration
 */
Route::post('/create', [
    'as' => 'addClient',
    'uses' => 'AdminController@RegisterCompany',
]);
/**
 * contacts
 */
Route::post('/createcontact', [
    'as' => 'addContact',
    'uses' => 'AdminController@Registercontact',
]);



/**
 *client routes
 * create user
 */
Route::post('/createuser', [
    'as' => 'adduser',
    'uses' => 'ClientController@createUser',
]);


/**
 * user creates beneficiary
 */
Route::post('/addBeneficiary', [
    'as' => 'addBeneficiary',
    'uses' => 'Usercontroler@createNewBeneficiary',
]);
Route::post('/testupload', [
    'as' => 'addBeneficiary',
    'uses' => 'Usercontroler@import',
]);