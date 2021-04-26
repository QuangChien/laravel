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

//backend
    Route::get('/login','AdminController@login')->name('login')->middleware('CheckLogout'); 
    Route::post('/login','AdminController@postLogin');
    Route::get('/admin','AdminController@login')->middleware('CheckLogout');
    Route::post('/admin','AdminController@postLogin');
    Route::get('admin/logout','AdminController@logout')->name('logout');

    Route::group(['prefix' => 'admin','middleware'=>'CheckLogin'],function () {

    Route::get('/home','AdminController@home')->name('home');
    Route::prefix('product')->group(function () {
        Route::get('/', [
            'as'=>'product.index',
            'uses'=>'Backend\Product\ProductController@index'
        ]);

        Route::get('create', [
            'as'=>'product.create',
            'uses'=>'Backend\Product\ProductController@create'
        ]);

        Route::post('store', [
            'as'=>'product.store',
            'uses'=>'Backend\Product\ProductController@store'
        ]);

        Route::get('edit/{id}', [
            'as'=>'product.edit',
            'uses'=>'Backend\Product\ProductController@edit'
        ]);

        Route::post('update/{id}', [
            'as'=>'product.update',
            'uses'=>'Backend\Product\ProductController@update'
        ]);

        Route::get('delete/{id}', [
            'as'=>'product.delete',
            'uses'=>'Backend\Product\ProductController@delete'
        ]);
    });


    //User
    Route::prefix('user')->group(function () {
        Route::get('/', [
            'as'=>'user.index',
            'uses'=>'Backend\User\UserController@index'
        ]);

        Route::get('create', [
            'as'=>'user.create',
            'uses'=>'Backend\User\UserController@create'
        ]);

        Route::post('store', [
            'as'=>'user.store',
            'uses'=>'Backend\User\UserController@store'
        ]);

        Route::get('edit/{id}', [
            'as'=>'user.edit',
            'uses'=>'Backend\User\UserController@edit'
        ]);

        Route::post('update/{id}', [
            'as'=>'user.update',
            'uses'=>'Backend\User\UserController@update'
        ]);

        Route::get('delete/{id}', [
            'as'=>'user.delete',
            'uses'=>'Backend\User\UserController@delete'
        ]);
    });

    //contact
    Route::prefix('contact')->group(function () {
        Route::get('/', [
            'as'=>'contact.index',
            'uses'=>'Backend\Contact\ContactController@index'
        ]);

        Route::get('/delete/{id}', [
            'as'=>'contact.delete',
            'uses'=>'Backend\Contact\ContactController@delete'
        ]);
    });

    //Order
    Route::prefix('order')->group(function () {
        Route::get('/', [
            'as'=>'order.index',
            'uses'=>'Backend\Order\OrderController@index'
        ]);

        Route::get('/update/{id}', [
            'as'=>'order.update',
            'uses'=>'Backend\Order\OrderController@update'
        ]);

        Route::get('/delete/{id}', [
            'as'=>'order.delete',
            'uses'=>'Backend\Order\OrderController@delete'
        ]);
    }); 

    //Comment

    Route::prefix('comment')->group(function () {
        Route::get('/', [
            'as'=>'comment.index',
            'uses'=>'Backend\Comment\CommentController@index'
        ]);

        Route::get('/update/{id}', [
            'as'=>'comment.update',
            'uses'=>'Backend\Comment\CommentController@update'
        ]);

        Route::get('/delete/{id}', [
            'as'=>'comment.delete',
            'uses'=>'Backend\Comment\CommentController@delete'
        ]);
    });
});

//Frontend
Route::prefix('/')->group(function () {
    Route::get('/', [
        'as'=>'index',
        'uses'=>'Frontend\Home\HomeController@index'
    ]);

    Route::get('/gioi-thieu', [
        'as'=>'introduction',
        'uses'=>'Frontend\Introduction\IntroductionController@index'
    ]);
    
    //product
    Route::get('/phong-khach-san', [
        'as'=>'product.list',
        'uses'=>'Frontend\Product\ProductController@list'
    ]);

    Route::get('/phong-khach-san/{id}', [
        'as'=>'product.item',
        'uses'=>'Frontend\Product\ProductController@index'
    ]);

    Route::get('/add-comment/{id}', [
        'as'=>'product.item.store',
        'uses'=>'Frontend\Product\ProductController@store'
    ]);

    Route::post('/order/{id}', [
        'as'=>'product.order',
        'uses'=>'Frontend\Product\ProductController@storeorder'
    ]);


    
    //contact
    Route::get('/lien-he', [
        'as'=>'contact',
        'uses'=>'Frontend\Contact\ContactController@index'
    ]);

    Route::post('/lienhe/store', [
        'as'=>'contact.store',
        'uses'=>'Frontend\Contact\ContactController@store'
    ]);
});


