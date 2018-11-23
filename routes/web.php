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

      Route::post('products/{product}/favorite', 'ProductsController@favor')->name('products.favor');
      Route::delete('products/{product}/favorite', 'ProductsController@disfavor')->name('products.disfavor');
      Route::get('products/favorites', 'ProductsController@favorites')->name('products.favorites');


      //Route::delete('cart/{sku}', 'CartController@remove')->name('cart.remove');


    });
    // 结束

});




Route::group(['middleware' => 'web'], function () {

    Route::get('addcart/{sku_id}/{amount?}', 'CartController@addtocart')->name('cart.addtocart'); //游客添加购物车
    Route::post('addcart', 'CartController@addcart')->name('cart.addcart'); //游客添加购物车
    Route::post('deletecart', 'CartController@deletecart')->name('cart.deletecart'); //购物车删除商品
    Route::post('updatecart', 'CartController@updatecart')->name('cart.updatecart'); //增加购物车商品
    Route::post('subcart', 'CartController@subcart')->name('cart.subcart'); //减少购物车商品
    Route::get('products', 'ProductsController@index')->name('products.index');
    Route::get('products/{product}', 'ProductsController@show')->name('products.show');
    Route::post('orders', 'OrdersController@store')->name('orders.store');
    Route::get('orders', 'OrdersController@index')->name('orders.index');
    Route::get('orders/{order}', 'OrdersController@show')->name('orders.show');

    Route::get('payment/alipay/return', 'PaymentController@alipayReturn')->name('payment.alipay.return');

    Route::post('checkout', 'PaymentController@checkout')->name('payment.checkout');
    Route::get('payment/success', 'PaymentController@paypalsuccess')->name('payment.paypalsuccess');

    Route::post('ipn/notify','PayPalController@postNotify');

    Route::post('/admin/upload','UploadController@index');

});

Route::post('cart', 'CartController@add')->name('cart.add');
Route::get('cart', 'CartController@index')->name('cart.index');

Route::get('{slug}.html', 'InformationController@show')->name('information.show'); //information

Route::get('guide', 'UserGuideController@index')->name('guide.index'); //user guide
Route::get('guide/{slug}.html', 'UserGuideController@show')->name('guide.show'); //user guide

Route::get('contact_us', 'ContactUsController@index')->name('contact.index'); //contact us
Route::post('contact_us', 'ContactUsController@send')->name('contact.send'); //contact us





Route::get('alipay', function() {
    return app('alipay')->web([
        'out_trade_no' => time(),
        'total_amount' => '1',
        'subject' => 'test subject - 测试',
    ]);
});


Route::post('payment/alipay/notify', 'PaymentController@alipayNotify')->name('payment.alipay.notify');
