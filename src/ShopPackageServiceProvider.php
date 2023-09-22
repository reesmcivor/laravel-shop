<?php

namespace ReesMcIvor\Shop;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ShopPackageServiceProvider extends ServiceProvider
{
    protected $namespace = 'ReesMcIvor\Shop\Http\Controllers';

    public function boot()
    {
        $this->tenancyExists = function_exists('tenancy');

        if($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../database/migrations' => class_exists('Stancl\Tenancy\TenancyServiceProvider') ? database_path('migrations/tenant') : database_path('migrations'),
                __DIR__ . '/../publish/tests' => base_path('tests/Shop'),
            ], 'laravel-shop');
        }

        $this->loadViewsFrom(__DIR__.'/resources/views', 'shop');
        $this->mapRoutes();
    }

    private function mapRoutes()
    {
        Route::middleware(array_filter(['web', $this->tenancyExists ? 'tenant' : null]))
            ->namespace($this->namespace)
            ->group($this->modulePath('routes/web.php'));
    }

    private function modulePath($path)
    {
        return __DIR__ . "/" . $path;
    }
}
