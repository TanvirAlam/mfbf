<?php

    Route::post('register', 'Auth\RegisterController@register');
    Route::get('verifyEmail/{token}', 'Auth\RegisterController@verifyEmail')->name('verify.email');
    Route::post('checkEmail', 'Auth\RegisterController@checkEmail');
    Route::post('login', 'Auth\LoginController@login');

    // TODO: Actually check the token. The jwt.auth middleware is broken as hell and doesn't even let the request reach the controller.
    Route::group(['before' => 'jwt.refresh', 'middleware' => 'jwt.auth'], function () {
        Route::get('user', 'Auth\LoginController@getUser');

        // Category Routes
        Route::group(['prefix' => 'category'], function () {
            Route::get('search', [
                'uses' => 'CategoryController@search',
                'as' => 'category.index'
            ]);

            Route::post('store', [
                'uses' => 'CategoryController@store',
                'as' => 'category.store'
            ]);

            Route::delete('{id}/delete', [
                'uses' => 'CategoryController@delete',
                'as' => 'category.delete'
            ]);
        });

        // Income Routes
        Route::group(['prefix' => 'income'], function () {
            Route::post('store', [
                'uses' => 'IncomeController@store',
                'as' => 'income.store'
            ]);

            Route::get('{id}/view', [
                'uses' => 'IncomeController@view',
                'as' => 'income.show'
            ]);
        });

    });
