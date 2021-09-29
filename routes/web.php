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
Route::group(['namespace' => 'admin', 'middleware'   => ['auth','superadmin']], function (){
    Route::get('registeruser', 'AdminLoginController@userRegister')->name('user.create');
	Route::post('registeruser', 'AdminLoginController@userRegisterData')->name('userregister');
    Route::get('user/list', 'AdminLoginController@adminUserList')->name('user.list');
	Route::get('user/{id}/edit', 'AdminLoginController@editUser')->name('user.edit');
	Route::any('updateuser/{id}', 'AdminLoginController@updateuser')->name('user.update');
    Route::get('user/delete/{id}', ['as' => 'user.delete', 'uses' => 'AdminLoginController@deleteUser']);
});

Route::group(['namespace' => 'admin', 'middleware'   => ['auth','roles']], function (){

    Route::get('/dashboard', 'AdminLoginController@dashboard')->name('dashboard');


     Route::any('updateuserprofile/{id}', 'AdminProfileController@updateuser')->name('userprofile.update');
	Route::get('userprofile/{id}/edituserprofile', 'AdminProfileController@editUserProfile')->name('userprofile.editprofile');

    // User Group
    Route::resource('usergroup', 'AdminGroupController');
    Route::get('usergroup/delete/{id}', ['as' => 'usergroup.delete', 'uses' => 'AdminGroupController@destroy']);
    // Role Access
    Route::resource('role-access', 'AdminRoleAccessController');
    Route::get('role-access/delete/{id}', ['as' => 'role-access.delete', 'uses' => 'AdminRoleAccessController@destroy']);
    Route::get('roleChangeAccess/{allowId}/{id}','AdminRoleAccessController@changeAccess');

    //Bay
    Route::resource('bay', 'AdminBayController')->except(['show']);
    Route::get('bay/delete/{id}', ['as' => 'bay.delete', 'uses' => 'AdminBayController@destroy']);
    Route::post('searchbay','AdminBayController@baySearch')->name('baysearch');
    Route::get('baydetail','AdminBayController@bayDetail');

    //Bay Graph
    Route::get('baygraph','AdminBayGraphController@index')->name('baygraph.index');
    Route::get('searchbay','AdminBayGraphController@searchBay');

    //Find Available Bay
    Route::get('findbay','AdminFindAvailableBayController@index')->name('findbay.index');
    Route::post('findbay','AdminFindAvailableBayController@findBay')->name('findbay');

    //Counter
    Route::resource('counter', 'AdminCounterController')->except(['show']);
    Route::get('counter/delete/{id}', ['as' => 'counter.delete', 'uses' => 'AdminCounterController@destroy']);
    Route::get('/counterdetail','AdminCounterController@counterDetail');
    Route::get('/searchcounter','AdminCounterController@counterSearch')->name('countersearch');

    //Flight Type
    Route::resource('flighttype', 'AdminFlightTypeController');
    Route::get('flighttype/delete/{id}', ['as' => 'flighttype.delete', 'uses' => 'AdminFlightTypeController@destroy']);

    //Add Bay
    Route::resource('addbay','AdminAddbayController');
    Route::get('addbay/delete/{id}', ['as' => 'addbay.delete', 'uses' => 'AdminAddbayController@destroy']);

});

Route::group(['namespace' => 'site'], function (){

});
