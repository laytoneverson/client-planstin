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


Route::prefix('employeer')->group(function(){
    Route::get('{controller?}/{method?}/{segments?}', 'MvcController@receive')->where([
        'segments' => '.*',
    ]);
});
Route::prefix('employee')->group(function(){
    Route::get('{controller?}/{method?}/{segments?}', 'MvcController@receive')->where([
        'segments' => '.*',
    ]);
});

Route::get('{controller?}/{method?}/{segments?}', 'MvcController@receive')->where([
    'segments' => '.*',
]);


