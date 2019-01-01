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

    /*  /login/client/...  */
    Route::prefix('client')->group(function(){
        Route::get('/', 'Portal\Client\LoginController@login')->name('login.client');
        Route::get('/forgot-password', 'Portal\Client\LoginController@forgotPassword')->name('login.client.forgot');
        Route::get('/reset-password', 'Portal\Client\LoginController@resetPassword')->name('login.client.reset');
        Route::get('/recovery-code', 'Portal\Client\LoginController@recoveryCode')->name('login.client.recovery');
    });

    /*  /login/member/...  */
    Route::prefix('member')->group(function(){
        Route::get('/', 'Portal\Member\LoginController@login')->name('login.member');
        Route::get('/forgot-password', 'Portal\Member\LoginController@forgotPassword')->name('login.member.forgot');
        Route::get('/reset-password', 'Portal\Member\LoginController@resetPassword')->name('login.member.reset');
        Route::get('/recovery-code', 'Portal\Member\LoginController@recoveryCode')->name('login.member.recovery');
    });

    /*  /login/member/...  */
    Route::prefix('broker')->group(function(){
        Route::get('/', 'Portal\Broker\LoginController@login')->name('login.broker');
        Route::get('/forgot-password', 'Portal\Broker\LoginController@forgotPassword')->name('login.broker.forgot');
        Route::get('/reset-password', 'Portal\Broker\LoginController@resetPassword')->name('login.broker.reset');
        Route::get('/recovery-code', 'Portal\Broker\LoginController@recoveryCode')->name('login.broker.recovery');
    });

});

Route::prefix('register')->group(function() {

    /*  /register/client/...  */
    Route::prefix('client')->group(function() {

        //Todo: Create middleware to make sure the user is on the correct step
        Route::any('/', 'Register\ClientRegisterController@signup')->name('register.client.signup');
        Route::any('profile', 'Register\ClientRegisterController@profile')->name('register.client.profile');
        Route::any('services', 'Register\ClientRegisterController@services')->name('register.client.services');
        Route::any('agreement', 'Register\ClientRegisterController@agreement')->name('register.client.agreements');
        Route::any('billing', 'Register\ClientRegisterController@billing')->name('register.client.billing');
        Route::any('employees', 'Register\ClientRegisterController@employees')->name('register.client.employees');

    });

    /*  /register/member/...  */
    Route::prefix('member')->group(function() {

        Route::any('/', 'Register\MemberRegisterController@signup')->name('register.member.signup');
        Route::any('enrollment', 'Register\MemberRegisterController@enrollment')->name('register.member.enrollment');
        Route::any('agreement', 'Register\MemberRegisterController@agreement')->name('register.member.agreement');

    });

    /* /register/broker/... */
    Route::prefix('broker')->group(function() {

        Route::any('/', 'Register\BrokerRegisterController@signup')->name('register.broker.signup');
        Route::any('contracting', 'Register\BrokerRegisterController@contracting')->name('register.broker.contracting');
        Route::any('agreement', 'Register\BrokerRegisterController@agreement')->name('register.broker.agreement');

    });

});

Route::prefix('portal')->group(function() {

    /*  /portal/client/...  */
    Route::prefix('client')->group(function() {

        Route::get('/', 'Portal\Client\DashboardController@home')->name('portal.client.dashboard');
        //other client routes

    });

    /*  /portal/member/...  */
    Route::prefix('member')->group(function(){

        Route::any('/', 'Portal\Member\DashboardController@home')->name('portal.member.dashboard');
        Route::any('agreement', 'Portal\Member\DashboardController@agreement')->name('portal.member.agreement');
        Route::any('benefits', 'Portal\Member\DashboardController@benefits')->name('portal.member.benefits');
        Route::any('dependents', 'Portal\Member\DashboardController@dependents')->name('portal.member.dependents');
        Route::any('employer', 'Portal\Member\DashboardController@employer')->name('portal.member.employer');
        Route::any('submit-event', 'Portal\Member\DashboardController@submitEvent')->name('portal.member.submit-event');
        Route::any('settings', 'Portal\Member\DashboardController@settings')->name('portal.member.settings');

    });

    /*  /portal/broker/...  */
    Route::prefix('broker')->group(function(){

        Route::any('/', 'Portal\Broker\DashboardController@home')->name('broker.dashboard');
        Route::any('profile', 'Portal\Broker\DashboardController@profile')->name('broker.profile');
        Route::any('direct-deposit', 'Portal\Broker\DashboardController@directDeposit')->name('broker.deposit');
        Route::any('direct-deposit/edit', 'Portal\Broker\DashboardController@directDepositEdit')->name('broker.deposit.edit');
        Route::any('clients', 'Portal\Broker\DashboardController@clients')->name('broker.clients');
        Route::any('statements', 'Portal\Broker\DashboardController@statements')->name('broker.statements');
        Route::any('documents', 'Portal\Broker\DashboardController@documents')->name('broker.documents');
        Route::any('settings', 'Portal\Broker\DashboardController@settings')->name('broker.settings');

    });

});

