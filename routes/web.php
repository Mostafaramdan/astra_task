<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});
Route::resource('/main_data', 'App\Http\Controllers\MainDataController');
Route::post('import_mapping_data', 'App\Http\Controllers\MappingDataController@import')->name('import_mapping_data');
Route::resource('/mapping_data', 'App\Http\Controllers\MappingDataController');
Route::resource('/matching_data', 'App\Http\Controllers\MatchingDataController');
Route::get('/matching_data_match', 'App\Http\Controllers\MatchingDataController@matching_data_match')->name('matching_data_match');
Route::get('import_data.store', 'App\Http\Controllers\MatchingDataController@import_data_store')->name('import_data.store');
