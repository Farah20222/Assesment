<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/first-customer-by-amount-spent', 'App\Http\Controllers\CustomerController@firstCustomerByAmountSpent');
Route::get('/first-customer-by-number-of-orders', 'App\Http\Controllers\CustomerController@firstCustomerByNumberOfOrders');
