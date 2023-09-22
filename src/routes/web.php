<?php

Route::middleware(array_filter([
    'api',
    'auth:sanctum',
    function_exists('tenancy') ? \Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain::class : null,
    function_exists('tenancy') ?PreventAccessFromCentralDomains::class : null,
]))->group(function () {

 
    
});