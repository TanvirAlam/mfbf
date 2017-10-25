<?php

    Route::post('register', 'Auth\RegisterController@register');
    Route::get('verifyEmail/{token}', 'Auth\RegisterController@verifyEmail')->name('verify.email');
    Route::post('checkEmail', 'Auth\RegisterController@checkEmail');
    Route::post('login', 'Auth\LoginController@login');

    Route::get('/redirect/facebook', 'Auth\SocialAuthController@redirectToProvider');
    Route::get('/facebook/callback', 'Auth\SocialAuthController@handleProviderCallback');
    Route::post('sociallite', 'Auth\SocialAuthController@authenticateUser');

    Route::group(['before' => 'jwt.refresh', 'middleware' => 'jwt.auth'], function () {
        Route::get('user', 'Auth\LoginController@getUser');
    });
