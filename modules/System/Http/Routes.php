<?php
/**
 * Routes - all Module's specific Routes are defined here.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 4.0
 */


/** Define static routes. */

Route::group(array('prefix' => '', 'namespace' => 'Modules\System\Http\Controllers'), function()
{
    // The Framework's Language Changer.
    Route::get('language/{code}', array('middleware' => 'referer', 'uses' => 'Language@update'))
        ->where('code', '([a-z]{2})');

    // The CRON runner.
    Route::get('cron/{token}', array('uses' => 'CronRunner@index'));
});

// The Adminstration Routes.
Route::group(array('prefix' => 'admin', 'namespace' => 'Modules\System\Http\Controllers\Admin'), function()
{
    // Notifications
    Route::get('notifications', array('middleware' => 'auth', 'uses' => 'Notifications@index'));

    // The Site Settings.
    Route::get( 'settings', array('middleware' => 'auth',      'uses' => 'Settings@index'));
    Route::post('settings', array('middleware' => 'auth|csrf', 'uses' => 'Settings@store'));

    // The Roles CRUD.
    Route::get( 'roles',              array('middleware' => 'auth',      'uses' => 'Roles@index'));
    Route::get( 'roles/create',       array('middleware' => 'auth',      'uses' => 'Roles@create'));
    Route::post('roles',              array('middleware' => 'auth|csrf', 'uses' => 'Roles@store'));
    Route::get( 'roles/{id}',         array('middleware' => 'auth',      'uses' => 'Roles@show'));
    Route::get( 'roles/{id}/edit',    array('middleware' => 'auth',      'uses' => 'Roles@edit'));
    Route::post('roles/{id}',         array('middleware' => 'auth|csrf', 'uses' => 'Roles@update'));
    Route::post('roles/{id}/destroy', array('middleware' => 'auth|csrf', 'uses' => 'Roles@destroy'));
});
