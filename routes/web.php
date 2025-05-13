<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/yanis', function () {
    return view('welcome');
});

Route::get('/cassandre', function () {
    return view('welcome');
});


Route::get('/JohannOrens', function () {
    return view('johannorens');
});
