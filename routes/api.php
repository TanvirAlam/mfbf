<?php

    Route::post('register', 'Auth\RegisterController@register');
    Route::get('verifyemail/{token}', 'Auth\RegisterController@verify');
    Route::post('checkEmail', 'Auth\RegisterController@checkEmail');
    Route::post('login', 'Auth\LoginController@login');

    Route::group(['before' => 'jwt.refresh', 'middleware' => 'jwt.auth'], function () {
        Route::get('user', 'Auth\LoginController@getUser');
    });
