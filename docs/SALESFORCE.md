# SalesForce Integration

## Overview

The sales force api is designed like this:

* `App\Service\SalesForce\**` - The namespace that the integration lives in.
* `ApiCall\**` - A class is created for every api call we make. They must extends the `AbstractSalesForceApiCall`. 
   All api calls are bound to the the service manager through the `SalesForceServiceProvider`.
* `Dto\**` - Data Transfer Objects are responsible for transferring data between the 
  application entities and the SalesForce API. There is a `DTO` for every API call.
* `SalesForceService` - A service currently used for managing authentication takens
* `SalesForceApiParameters` - A class constructed during load that holds API authentication
  info and other api parameters used by the API Calls.

## Creating an API Call

1. Create a new class that extends `AbstractSalesForceApiCall` and implement abstract methods.
2. Create a new Dto that implements the `SalesForceDtoInterface` and implement defined methods. 
3. Register the new call in the application config.
