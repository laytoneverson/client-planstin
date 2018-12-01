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

use Illuminate\Http\Request;

Route::get('portal/oath_callback', function (Request $request) {
    $format = <<<EOHTML
<h1 style="text-align:center; width: 30%%; margin: auto;"> OAuth Authorization Code </h1>
<div style="text-align:center; width: 30%%; margin: auto;"> 
    <p><strong>Code: </strong> %s </p>    
    <p><strong>State: </strong> %s </p>    
</div>
EOHTML;


    echo sprintf(
        $format,
        $request->get('code'),
        $request->get('state')
    );
});

Route::get('login/client', 'Client\LoginController@login');
Route::get('login/client/forgot-password', 'Client\LoginController@forgotPassword');
Route::get('login/client/reset-password', 'Client\LoginController@resetPassword');
Route::get('login/client/recovery-code', 'Client\LoginController@recoveryCode');


Route::prefix('register')->group(function(){
    Route::prefix('client')->group(function(){
        Route::any('signup', 'Client\RegisterController@signup');
        Route::any('profile', 'Client\RegisterController@profile');
        Route::any('services', 'Client\RegisterController@services');
        Route::any('agreement', 'Client\RegisterController@agreement');
        Route::any('employees', 'Client\RegisterController@employees');
    });
    Route::prefix('member')->group(function(){
        
    });
});

Route::prefix('company')->group(function(){
    Route::get('dashboard', 'Company\DashboardController@index');
});

// Route::prefix('employer')->group(function(){
//     Route::get('{controller?}/{method?}/{segments?}', 'MvcController@receive')->where([
//         'segments' => '.*',
//     ]);
// });
// Route::prefix('employee')->group(function(){
//     Route::get('{controller?}/{method?}/{segments?}', 'MvcController@receive')->where([
//         'segments' => '.*',
//     ]);
// });
// Route::get('{controller?}/{method?}/{segments?}', 'MvcController@receive')->where([
//     'segments' => '.*',
// ]);






