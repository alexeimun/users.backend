<?php

$app->group(['namespace' => '\App\Http\Controllers\Auth'], function () use ($app) {

    $app->group(['prefix' => 'auth'], function () use ($app) {
        $app->post('login', 'LoginController@authentificate');

        $app->group(['prefix' => 'register'], function () use ($app) {
            $app->post('/', 'RegisterController@register');
            $app->post('/validate', 'RegisterController@validateEmail');
            $app->get('/resend_validate', ['middleware' => 'auth', 'uses' => 'RegisterController@reSendValidate']);
            $app->get('/resend_validate/{id}', ['middleware' => 'auth', 'uses' => 'RegisterController@reSendValidateById']);
        });

        $app->group(['prefix' => 'reset'], function () use ($app) {
            $app->post('/', 'ForgotPasswordController@sendResetLinkEmail');
            $app->post('/validate', 'ForgotPasswordController@reset');
        });
    });

});
