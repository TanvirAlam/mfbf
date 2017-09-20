<?php

Route::get('/test', function () {
    return JWTAuth::parseToken()->authenticate();
});
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', 'Auth\LoginController@logout');
    Route::get('/user', 'Auth\LoginController@getUserInformation');

    /*Route::patch('settings/profile', 'SettingsController@updateProfile');
    Route::patch('settings/password', 'SettingsController@updatePassword');*/
});

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');
    Route::get('verifyemail/{token}', 'Auth\RegisterController@verify');
    Route::post('checkEmail', 'Auth\RegisterController@checkEmail');
    /*Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');*/
});

/*Route::group(['prefix' => 'api', function () {

    $this->post('login', 'Auth\AuthController@login');
    $this->get('logout', 'Auth\AuthController@logout');

    Route::group(['prefix' => 'restricted', 'middleware' => 'auth:api',], function () {
        Route::get('/test', function () {
            return 'authenticated';
        });
    });
});*/