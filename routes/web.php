<?php
Route::view('verify', 'auth.verify');
Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('products', 'WelcomeController@products');
Route::get('product-detail', 'WelcomeController@product_detail');
Route::get('product-model-show/{id}', 'WelcomeController@product_model');
Route::get('contact-shop', 'WelcomeController@contact_shop');
Route::get('home', 'HomeController@index')->name('home');

Auth::routes();
Route::middleware(['auth', 'role:guest'])->group(function () {

    Route::get('mycart', 'MyCartController@index');
    Route::get('order-product-mycart', 'MyCartController@store');
    Route::patch('order-product-mycart-update', 'MyCartController@update');
    Route::get('mycart-delete/{id}', 'MyCartController@destroy');


    Route::get('mywishlist', 'MyWishlistController@index');
    Route::get('order-product-mywishlist', 'MyWishlistController@store');
    Route::get('mywishlist-delete/{id}', 'MyWishlistController@destroy');


    Route::get('mycheckout', 'MyCheckoutController@index');
    Route::get('mycheckout-detail/{id}', 'MyCheckoutController@show');
    Route::post('order-product-mycheckout', 'MyCheckoutController@store');

    Route::get('myaccount', 'MyAccountController@index');
    Route::post('myaccount-create', 'MyAccountController@store');
    Route::get('myaccount-edit/{id}','MyAccountController@edit');
    Route::patch('myaccount-update/{id}', 'MyAccountController@update');
    Route::delete('myaccount-delete/{id}', 'MyAccountController@destroy');

    Route::post('comment', 'ReviewController@store')->name('comment');
    Route::get('vote/{id}/{score}', 'VoteController@store');


    Route::get('order-product-mylikes/{id}', 'MyWishlistController@product_likes');
    Route::patch('change-password', 'ChangePasswordController@update')->name('change.password');

});

Route::middleware(['auth', 'role:admin'])->group(function () {
    /**! admin */
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::patch('admin-change-password', 'ChangePasswordController@changepassword')->name('admin.changepassword');

    Route::get('product', 'ProductController@index');
    Route::get('product/create', 'ProductController@create');
    Route::post('product', 'ProductController@store');
    Route::get('product/{id}', 'ProductController@show');
    Route::get('product/{id}/edit', 'ProductController@edit');
    Route::patch('product/{id}', 'ProductController@update');
    Route::delete('product/{id}', 'ProductController@destroy');

    Route::get('order', 'OrderController@index');
    Route::patch('update-order', 'OrderController@update')->name('update.order');
    Route::patch('cancel-order', 'OrderController@cancel')->name('cancel.order');
    Route::get('order-product/{po_id}', 'OrderController@show');
    Route::get('product-show/{pro_id}', 'OrderController@showProduct');


    Route::get('profile', 'ProfileController@index');
    Route::get('profile/{id}', 'ProfileController@show');
    Route::delete('profile/{id}', 'ProfileController@destroy');


    Route::get('config', 'ConfigController@index');
    Route::get('config/{id}/edit', 'ConfigController@edit');
    Route::patch('config/{id}', 'ConfigController@update');



    Route::get('income', 'IncomeController@index');
    Route::get('income/create', 'IncomeController@create');
    Route::post('income', 'IncomeController@store_update');
    //Route::get('income/{id}', 'IncomeController@show');
    Route::get('income/{id}/edit', 'IncomeController@edit');

    Route::get('order-address/{id}', 'OrderController@pdf_order_address'); // พิมพ์รายการเดินบัญชี - รายรับ

});

//symlink('/home/u868114858/domains/pawarisa-shop.com/storage/app/public', '/home/u868114858/domains/pawarisa-shop.com/public_html/storage');
