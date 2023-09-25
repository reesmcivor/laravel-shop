<?php

Route::middleware(['api', 'auth:sanctum'])->prefix('api')->name('api.')->group(function () {
    Route::post('shop/coupon/apply', [\ReesMcIvor\Shop\Http\Controllers\Api\CouponController::class, 'apply'])->name('shop.coupon.apply');
    Route::post('shop/coupon/remove', [\ReesMcIvor\Shop\Http\Controllers\Api\CouponController::class, 'remove'])->name('shop.coupon.remove');
});
