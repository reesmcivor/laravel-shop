<?php

namespace ReesMcIvor\Shop\Tests\Feature;


use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Coupon;
use App\Models\User;

class CouponTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_global_coupon_can_be_used()
    {
        Coupon::factory()->create([
            'code' => 'COUPON-CODE',
            'type' => 'global',
            'value' => 10,
        ]);

    }
}