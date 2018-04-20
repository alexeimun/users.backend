<?php

$app->group(['prefix' => 'users'], function () use ($app) {
    $app->get('/', 'UserController@all');
    $app->get('/{id:\d+}', 'UserController@show');
    $app->post('/', 'UserController@create');
    $app->put('{id:\d+}', 'UserController@update');
    $app->delete('{id:\d+}', 'UserController@destroy');
});

$app->group(['prefix' => 'articles'], function () use ($app) {
    $app->get('/', 'ArticleController@all');
    $app->get('/', 'ArticleController@show');
    $app->post('/', 'ArticleController@create');
    $app->put('{id:\d+}', 'ArticleController@update');
    $app->delete('{id:\d+}', 'ArticleController@destroy');
});

$app->group(['prefix' => 'comments'], function () use ($app) {
    $app->get('/', 'CommentController@all');
    $app->get('/', 'CommentController@show');
    $app->post('/', 'CommentController@create');
    $app->put('{id:\d+}', 'CommentController@update');
    $app->delete('{id:\d+}', 'CommentController@destroy');
});

