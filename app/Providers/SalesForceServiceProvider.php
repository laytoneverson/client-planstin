<?php

namespace App\Providers;

use App\Services\SalesForce\SalesForceApiParameters;
use App\Services\SalesForce\SalesForceService;
use Illuminate\Support\ServiceProvider;

class SalesForceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerApiParameters();

        //Register the API service
        $this->app->singleton(SalesForceService::class);

        //Register the calls (Must extend AbstractSalesForceApiCall)
        $this->registerApiCalls();
    }

    private function registerApiParameters()
    {
        $this->app->singleton(

            SalesForceApiParameters::class,

            function ($app) {

                $env = config('app.salesforce.env');
                $sfApiParams = new SalesForceApiParameters();

                $sfApiParams
                    ->setClientId(
                        config('app.salesforce.client_id')
                    )
                    ->setClientSecret(
                        config('app.salesforce.client_secret')
                    )
                    ->setRedirectUri(
                        config('app.salesforce.redirect_uri')
                    )
                    ->setAuthEndpoint(
                        config("app.salesforce.endpoints.{$env}")
                    )
                    ->setVersion(
                        config('app.salesforce.version_endpoint_uri')
                    )
                    ->setDebug(
                        config('app.debug')
                    )
                    ->setEnv($env);

                return $sfApiParams;
            });
    }

    private function registerApiCalls()
    {
        $apiCalls = config('app.salesforce.api_calls');

        foreach ($apiCalls as $apiCall) {
            $this->app->bind($apiCall);
        }
    }
}
