<?php

namespace ReesMcIvor\Shop\Traits;

use ReesMcIvor\Shop\Models\Coupon;

trait HasCoupons
{
    public function coupons()
    {
        return $this->belongsToMany(Coupon::class);
    }
}