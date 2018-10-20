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

Route::get('/', 'PagesController@root')->name('root');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/email_verify_notice', 'PagesController@emailVerifyNotice')->name('email_verify_notice');   //提示用户需要验证邮箱
    Route::get('/email_verification/verify', 'EmailVerificationController@verify')->name('email_verification.verify');  //用户点击验证邮箱
    Route::get('/email_verification/send', 'EmailVerificationController@send')->name('email_verification.send'); //手动重新发送验证链接
    // 需要邮件验证后才能访问开始
    Route::group(['middleware' => 'email_verified'], function() {
    // 需要邮件验证后才能访问开始

      Route::get('user_addresses', 'UserAddressesController@index')->name('user_addresses.index');
      Route::get('user_addresses/create', 'UserAddressesController@create')->name('user_addresses.create');
      Route::post('user_addresses', 'UserAddressesController@store')->name('user_addresses.store');
      Route::get('user_addresses/{user_address}', 'UserAddressesController@edit')->name('user_addresses.edit');
      Route::put('user_addresses/{user_address}', 'UserAddressesController@update')->name('user_addresses.update');
      Route::delete('user_addresses/{user_address}', 'UserAddressesController@destroy')->name('user_addresses.destroy');  
    });
    // 结束

});
