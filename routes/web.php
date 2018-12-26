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

Route::view('/', "links");

Route::prefix('login')->group(function(){

    Route::prefix('client')->group(function(){
        Route::get('/', 'Client\LoginController@login')->name('client.login');
        Route::get('/forgot-password', 'Client\LoginController@forgotPassword')->name('client.forgot');
        Route::get('/reset-password', 'Client\LoginController@resetPassword')->name('client.reset');
        Route::get('/recovery-code', 'Client\LoginController@recoveryCode')->name('client.recovery'); 
    });

    Route::prefix('member')->group(function(){
        Route::get('/', 'Member\LoginController@login')->name('member.login');
        Route::get('/forgot-password', 'Member\LoginController@forgotPassword')->name('member.forgot');
        Route::get('/reset-password', 'Member\LoginController@resetPassword')->name('member.reset');
        Route::get('/recovery-code', 'Member\LoginController@recoveryCode')->name('member.recovery'); 
    });

    Route::prefix('broker')->group(function(){
        Route::get('/', 'Broker\LoginController@login')->name('broker.login');
        Route::get('/forgot-password', 'Broker\LoginController@forgotPassword')->name('broker.forgot');
        Route::get('/reset-password', 'Broker\LoginController@resetPassword')->name('broker.reset');
        Route::get('/recovery-code', 'Broker\LoginController@recoveryCode')->name('broker.recovery'); 
    });

});



Route::prefix('register')->group(function() {

    /*  /register/client/...  */
    Route::prefix('client')->group(function() {
        //Todo: Create middleware to make sure the user is on the correct step
        Route::any('signup', 'Client\RegisterController@signup')->name('client.signup');
        Route::any('profile', 'Client\RegisterController@profile')->name('client.profile');
        Route::any('services', 'Client\RegisterController@services')->name('client.services');
        Route::any('agreement', 'Client\RegisterController@agreement')->name('client.agreements');
        Route::any('employees', 'Client\RegisterController@employees')->name('client.employees');
    });

    /*  /register/member/...  */
    Route::prefix('member')->group(function() {

        Route::any('signup', 'Member\RegisterController@signup')->name('member.signup');
        Route::any('enrollment', 'Member\RegisterController@enrollment')->name('member.enrollment');
        Route::any('agreement', 'Member\RegisterController@agreement')->name('member.agreement');
    });

    Route::prefix('broker')->group(function() {

        Route::any('signup', 'Broker\RegisterController@signup')->name('broker.signup');
        Route::any('contracting', 'Broker\RegisterController@contracting')->name('broker.contractings');
        Route::any('agreement', 'Broker\RegisterController@agreement')->name('broker.agreement');
    });
});


Route::prefix('client/dashboard')->group(function(){
    Route::get('/', 'Client\DashboardController@home');
    //other client routes
});

Route::prefix('member/dashboard')->group(function(){
    Route::any('/', 'Member\DashboardController@home')->name('member.dashboard');

    Route::any('agreement', 'Member\DashboardController@agreement')->name('member.agreement');
    Route::any('benefits', 'Member\DashboardController@benefits')->name('member.benefits');
    Route::any('dependents', 'Member\DashboardController@dependents')->name('member.dependents');
    Route::any('employer', 'Member\DashboardController@employer')->name('member.employer');
    Route::any('submit-event', 'Member\DashboardController@submitEvent')->name('member.submit-event');
    Route::any('settings', 'Member\DashboardController@settings')->name('member.settings');
});


Route::prefix('broker/dashboard')->group(function(){
    Route::any('/', 'Broker\DashboardController@home')->name('broker.dashboard');

    Route::any('profile', 'Broker\DashboardController@profile')->name('broker.profile');
    Route::any('direct-deposit', 'Broker\DashboardController@directDeposit')->name('broker.deposit');
    Route::any('direct-deposit/edit', 'Broker\DashboardController@directDepositEdit')->name('broker.deposit.edit');
    Route::any('clients', 'Broker\DashboardController@clients')->name('broker.clients');
    Route::any('statements', 'Broker\DashboardController@statements')->name('broker.statements');
    Route::any('documents', 'Broker\DashboardController@documents')->name('broker.documents');
    Route::any('settings', 'Broker\DashboardController@settings')->name('broker.settings');
});






