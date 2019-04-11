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
 * Ajax routes
 */
Route::get('/ajax/perPage/{perPage?}','AjaxController@perPage');
Route::get('/ajax/sort/{sort?}','AjaxController@sort');
Route::get('/ajax/rate/{rate?}/{product?}/{user?}','AjaxController@rate');
Route::get('/ajax/search/{param?}','AjaxController@search');
Route::get('/ajax/cart/{user?}','AjaxController@cartSearch');
Route::get('/ajax/action/{discount?}','AjaxController@action');
Route::get('/pagination','AjaxController@pagination');
Route::get('/pageLinks','AjaxController@pageLinks');

/**
 * routes for user
 */
Route::group(['middleware' => 'block'],function(){
    Route::get('/', 'FrontendController@index')->name('home');
    Route::get('/registration', 'FrontendController@registration');
    Route::get('/login', 'FrontendController@login');
    Route::get('/contact', 'FrontendController@contact');
    Route::get('/products/{id?}', 'FrontendController@allProducts');
    Route::get('/category/{id}', 'FrontendController@getByCategory');
    Route::get('/action', 'FrontendController@action');
    Route::get('/hit', 'FrontendController@hit');
    Route::post('/sendmail', 'FrontendController@sendMail');
    Route::post('/cart/{product}', 'FrontendController@store');

    Route::group(['middleware' => 'blockCart'], function(){
        Route::get('/cart/{user}', 'FrontendController@viewStore');
    });
    
    Route::get('/cart/delete/{cart_id}', 'FrontendController@emptyCart');
    Route::post('/comment/insert', 'FrontendController@insertComment')->name('comment');
    Route::get('/gallery/{id?}', 'FrontendController@gallery');
});


/**
 * login routes
 */
Route::post('/login', 'LoginController@login')->name('login');
Route::get('/logout', 'LoginController@logout')->name('logout');

/**
 * registration for users
 */
Route::post('/register', 'LoginController@register')->name('register');

/**
 * routes for admin
 */
Route::group(['middleware' => 'admin'],function(){
    Route::group(['prefix' => '/admin'], function (){

        Route::get('/home','Admin\AdminController@index')->name('admin');

        Route::get('/notify','Admin\AdminController@notify');
        Route::get('/notify/update/{id}','Admin\AdminController@notifyUpdate');

        Route::get('/inbox/{id?}','Admin\AdminController@inbox');
        Route::get('/inbox/delete/{id}','Admin\MessageController@inboxDelete');

        Route::get('/gallery','Admin\AdminController@gallery');
        Route::post('/gallery/insert','Admin\GalleryController@insert');
        Route::get('/gallery/edit/{id}','Admin\GalleryController@showOne');
        Route::post('/gallery/update/{id}','Admin\GalleryController@update');
        Route::get('/gallery/delete/{id}','Admin\GalleryController@delete');

        Route::get('/category', 'Admin\AdminController@category');
        Route::post('/category/insert','Admin\CategoryController@insert');
        Route::get('/category/edit/{id}','Admin\CategoryController@showOne');
        Route::post('/category/update/{id}','Admin\CategoryController@update');
        Route::get('/category/delete/{id}','Admin\CategoryController@delete');

        Route::get('/users', 'Admin\AdminController@users');
        Route::get('/users/edit/{id}','Admin\UserController@showOne');
        Route::post('/users/update/{id}','Admin\UserController@update');
        Route::get('/users/delete/{id}','Admin\UserController@delete');

        Route::get('/cart','Admin\AdminController@cart');
        Route::get('/cart/delete/{id}','Admin\CartController@delete');

        Route::get('/product', 'Admin\AdminController@products');
        Route::post('/product/insert', 'Admin\ProductController@insert');
        Route::get('/product/edit/{id}','Admin\ProductController@showOne');
        Route::post('/product/update/{id}','Admin\ProductController@update');
        Route::get('/product/delete/{id}','Admin\ProductController@delete');

        Route::get('/slider', 'Admin\AdminController@slider');
        Route::post('/slider/insert', 'Admin\SliderController@insert');
        Route::get('/slider/edit/{id}','Admin\SliderController@showOne');
        Route::post('/slider/update/{id}','Admin\SliderController@update');
        Route::get('/slider/delete/{id}','Admin\SliderController@delete');

        Route::get('/images', 'Admin\AdminController@images');
        Route::post('/images/insert', 'Admin\ImageController@insert');
        Route::get('/images/delete/{id}','Admin\ImageController@showOne');
        Route::get('/image/delete/{id}','Admin\ImageController@delete');

    });
});


