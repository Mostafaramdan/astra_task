<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});
Route::resource('/table_1', 'App\Http\Controllers\Table1Controller');
Route::resource('/table_2', 'App\Http\Controllers\Table2Controller');
Route::resource('/table_3', 'App\Http\Controllers\Table3Controller');
