<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hakkimizda', function () {
    return "<h1>Şirketimiz Hakkında Bilgiler...</h1>";
});
  