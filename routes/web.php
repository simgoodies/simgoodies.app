<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['uses' => 'LandingPageController@index', 'as' => 'landing.show']);
Route::post('/', ['uses' => 'SubscriptionRequestController@store', 'as' => 'subscription-request.store'])->middleware('spam-protection');
Route::get('confirm-subscription/{token}', ['uses' => 'SubscriptionController@store', 'as' => 'subscription.store']);
Route::get('discord', function () {
    return redirect('https://discord.gg/aQkKcf5');
});
