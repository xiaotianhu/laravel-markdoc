<?php 
Route::prefix('markdoc')
    ->middleware(Xiaotianhu\Markdoc\Middleware\MarkdocMiddleware::class)
    ->namespace('Xiaotianhu\Markdoc\Controllers')
    ->group(function(){

        Route::get('/index', 'IndexController@index');

        Route::get('/getcontent', 'IndexController@getContent');

    });
