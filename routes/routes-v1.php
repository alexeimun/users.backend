<?php

    $app->group(['prefix' => 'clientes'], function () use ($app) {
        $app->get('/', 'ClientesController@show');
        $app->post('/', 'ClientesController@create');
        $app->put('{id:\d+}', 'ClientesController@update');
        $app->delete('{id:\d+}', 'ClientesController@destroy');
    });

    $app->group(['prefix' => 'casos'], function () use ($app) {
        $app->get('/', 'CasosController@show');
        $app->post('/', 'CasosController@create');
        $app->put('{id:\d+}', 'CasosController@update');
        $app->delete('{id:\d+}', 'CasosController@destroy');
    });

    $app->group(['prefix' => 'asesores'], function () use ($app) {
        $app->get('/', 'AsesoresController@show');
        $app->post('/', 'AsesoresController@create');
        $app->put('{id:\d+}', 'AsesoresController@update');
        $app->delete('{id:\d+}', 'AsesoresController@destroy');
    });