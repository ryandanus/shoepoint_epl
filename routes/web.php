<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/tracking', 'TrackingController@showTrack')
    ->name('tracking');

Route::get('/services', function(){
    return view('service');
});

Route::get('/about-us', function(){
    return view('about');
});

Route::get('/contact-us', function(){
    return view('contact');
});

Route::post('/contact-us/send', 'ContactController@sendMessage')
    ->name('contact-send');

Route::group(['prefix' => 'admin'], function () {
    //Auth::routes();

    Route::get('/', function(){
        return redirect('admin/login');
    });

    Route::group(['middleware' => ['guest']], function () {
        // Authentication Routes...
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login');

        // Registration Routes...
        Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    });

    Route::any('logout', 'Auth\LoginController@logout')->name('logout');

    // ADMIN
    Route::group(['middleware' => ['checkAdmin', 'auth']], function () {
        Route::get('dashboard', 'HomeController@index')->name('dashboard');
        Route::get('new-user', 'AdminController@displayNewUser')->name('new-user');
        Route::get('users', 'AdminController@displayAllUsers')->name('all-user');
        Route::get('new-order', 'AdminController@displayNewOrder')->name('new-order');
        Route::get('transactions', 'AdminController@displayAllOrders')->name('all-order');
        Route::get('new-service', 'AdminController@displayNewService')->name('new-service');
        Route::get('services', 'AdminController@displayAllServices')->name('all-service');
        Route::get('settings', 'AdminController@displaySetting')->name('setting');

        Route::get('users/{id}/edit', 'AdminController@displayEditUser')->name('edit-user');
        Route::get('services/{id}/edit', 'AdminController@displayEditService')->name('edit-service');
        Route::get('transactions/{id}/edit', 'AdminController@displayEditOrder')->name('edit-order');

        Route::post('new-user/add', 'AdminController@addNewUser')->name('insert-new-user');
        Route::post('new-order/add', 'AdminController@addNewOrder')->name('insert-new-order');
        Route::post('new-service/add', 'AdminController@addNewService')->name('insert-new-service');

        Route::put('users/{id}/edit/update', 'AdminController@updateUser')->name('update-user');
        Route::put('services/{id}/edit/update', 'AdminController@updateService')->name('update-service');
        Route::put('transactions/{id}/edit/update', 'AdminController@updateOrder')->name('update-order');

        Route::delete('users/delete', 'AdminController@deleteUser')->name('delete-user');
        Route::delete('services/delete', 'AdminController@deleteService')->name('delete-service');
        Route::delete('transactions/delete', 'AdminController@deleteOrder')->name('delete-order');

        Route::get('settings/{id}/change-password', 'AdminController@viewChangePassword')->name('show-change-password');
        Route::put('settings/{id}/change-password/change', 'AdminController@changePassword')->name('change-password');
    });
});