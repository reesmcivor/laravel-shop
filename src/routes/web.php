<?php

use ReesMcIvor\Shop\Http\Controllers as Controllers;

Route::middleware(array_filter([
    'auth',
    function_exists('tenancy') ? \Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains::class : null,
    function_exists('tenancy') ? 'tenant' : null,
]))->prefix('admin/shop')->name('admin.shop.')->group(function () {
    Route::resource('coupons', Controllers\Admin\CouponController::class);
});

