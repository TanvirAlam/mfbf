<?php

    Route::post('register', 'Auth\RegisterController@register');
    Route::get('verifyEmail/{token}', 'Auth\RegisterController@verifyEmail')->name('verify.email');
    Route::post('checkEmail', 'Auth\RegisterController@checkEmail');
    Route::post('login', 'Auth\LoginController@login');

    // TODO: Actually check the token. The jwt.auth middleware is broken as hell and doesn't even let the request reach the controller.
    Route::group(['before' => 'jwt.refresh', 'middleware' => 'jwt.auth'], function () {
        Route::get('user', 'Auth\LoginController@getUser');
    });
