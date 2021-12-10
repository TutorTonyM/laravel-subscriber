<?php

use Illuminate\Support\Facades\Route;
use TutorTonyM\Subscriber\Http\SubscriberController;

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

Route::post('subscribe', [SubscriberController::class, 'store'])->name('subscriber.store');