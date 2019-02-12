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

use Spatie\Honeypot\ProtectAgainstSpam;

Route::get('/', ['uses' => 'LandingPageController@index', 'as' => 'landing.show']);
Route::post('/', ['uses' => 'SubscriptionController@store', 'as' => 'subscription.store'])->middleware(ProtectAgainstSpam::class);
Route::get('confirm-subscription/{token}', ['uses' => 'SubscriptionConfirmationController@store', 'as' => 'confirmation.store']);
