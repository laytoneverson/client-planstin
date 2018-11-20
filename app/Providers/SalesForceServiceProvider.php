<?php

namespace App\Providers;

use App\Services\SalesForce\ApiConnection\SalesForceApiConnectionInterface;
use App\Services\SalesForce\ApiConnection\SalesForceRestApiConnection;
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

        //Allows us to register services for different API i.e. REST vs SOAP
        $this->registerApiConnections();

        //Register the API service (This is nearly depreciated)
        $this->app->singleton(SalesForceService::class);

        //Bind the Rest Implementation to the ApiConnection interface
        $this->app->bind(SalesForceApiConnectionInterface::class,SalesForceRestApiConnection::class);

        //Register the calls (Must extend AbstractSalesForceApiCall)
        $this->registerApiCalls();
    }

    public function registerApiConnections()
    {
        $this->app->bind(SalesForceRestApiConnection::class);
    }

    private function registerApiParameters()
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

    private function registerApiCalls()
    {
        $apiCalls = config('app.salesforce.api_calls');

        foreach ($apiCalls as $apiCall) {
            $this->app->bind($apiCall);
        }
    }
}
