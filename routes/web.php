<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/discord', 'https://discord.com/invite/aQkKcf5');
