<?php

namespace ReesMcIvor\Shop\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use ReesMcIvor\Shop\Models\Coupon;

class CouponFactory extends Factory
{

    protected $model = Coupon::class;

    public function definition() : array
    {
        return [
            'code' => strtoupper("COUPON-CODE"),
        ];
    }
}
