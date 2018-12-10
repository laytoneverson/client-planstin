<?php

namespace App\Providers;

use App\Services\SalesForce\SalesForceApiParameters;
use App\Services\SalesForce\SalesForceTokenService;
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
        //Loading this service populates the ApiParameters class with the current token
        $tokenService = $this->app->get(SalesForceTokenService::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerApiParameters();

        //Register the calls (Must extend AbstractSalesForceApiCall)
        $this->registerApiCalls();
    }


    private function registerApiParameters(): void
    {
        $this->app->singleton(

            SalesForceApiParameters::class,

            function ($app) {

                $env = config('app.env');

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
                        config("app.salesforce.authentication_endpoints.{$env}")
                    )
                    ->setApiEndpoint(
                        config("app.salesforce.api_endpoints.{$env}")
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

    private function registerApiCalls(): void
    {
        $apiCalls = config('app.salesforce.api_calls');

        foreach ($apiCalls as $apiCall) {
            $this->app->bind($apiCall);
        }
    }
}
