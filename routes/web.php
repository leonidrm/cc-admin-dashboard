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

/**
 * Auth routes
 */

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Auth'], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

    // Confirmation Routes...
    if (config('auth.users.confirm_email')) {
        Route::get('confirm/{user_by_code}', 'ConfirmController@confirm')->name('confirm');
        Route::get('confirm/resend/{user_by_email}', 'ConfirmController@sendEmail')->name('confirm.send');
    }
});

/**
 * Backend routes
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {

    // Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');

    //Users
    Route::get('users', 'UserController@index')->name('users');
    Route::get('users/add', 'UserController@addUser')->name('users.add');
    Route::post('users/create', 'UserController@createUser')->name('users.create');
    Route::get('users/restore', 'UserController@restore')->name('users.restore');
    Route::get('users/{id}/restore', 'UserController@restoreUser')->name('users.restore-user');
    Route::get('users/{user}', 'UserController@show')->name('users.show');
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('users/{user}', 'UserController@update')->name('users.update');
    Route::any('users/{id}/destroy', 'UserController@destroyUser')->name('users.destroy');
    Route::get('permissions', 'PermissionController@index')->name('permissions');
    Route::get('permissions/{user}/repeat', 'PermissionController@repeat')->name('permissions.repeat');
    Route::get('dashboard/log-chart', 'DashboardController@getLogChartData')->name('dashboard.log.chart');
    Route::get('dashboard/registration-chart', 'DashboardController@getRegistrationChartData')->name('dashboard.registration.chart');

    Route::get('clients', 'UserController@clientList')->name('clients');
    Route::get('clients/add', 'UserController@addClient')->name('clients.add');
    Route::post('clients/create', 'UserController@createClient')->name('clients.create');
    Route::get('clients/restore', 'UserController@restore-client')->name('clients.restore');
    Route::get('clients/{id}/restore', 'UserController@restoreClient')->name('clients.restore');
    Route::get('clients/{user}', 'UserController@showClient')->name('clients.show');
    Route::get('clients/{user}/edit', 'UserController@editClient')->name('clients.edit');
    Route::put('clients/{user}', 'UserController@updateClient')->name('clients.update');
    Route::any('clients/{id}/destroy', 'UserController@destroyClient')->name('clients.destroy');

    //Industries
    Route::get('industries', 'IndustryController@index')->name('industries');
    Route::post('industries/create', 'IndustryController@create')->name('industries.create');
    Route::get('industries/add', 'IndustryController@add')->name('industries.add');
    Route::get('industries/{industry}', 'IndustryController@show')->name('industries.show');
    Route::get('industries/{industry}/edit', 'IndustryController@edit')->name('industries.edit');
    Route::put('industries/{industry}', 'IndustryController@update')->name('industries.update');
    Route::any('industries/{id}/destroy', 'IndustryController@destroy')->name('industries.destroy');

    //Companies
    Route::get('companies', 'CompanyController@index')->name('companies');
    Route::get('companies/add', 'CompanyController@add')->name('companies.add');
    Route::post('companies/create', 'CompanyController@create')->name('companies.create');
    Route::get('companies/{company}', 'CompanyController@show')->name('companies.show');
    Route::get('companies/{company}/edit', 'CompanyController@edit')->name('companies.edit');
    Route::put('companies/{company}', 'CompanyController@update')->name('companies.update');
});

Route::group(['prefix' => 'member', 'as' => 'member.', 'namespace' => 'Member', 'middleware' => 'member'], function () {

    // Member Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');

});

Route::get('/', 'HomeController@index');
