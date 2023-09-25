<?php

namespace ReesMcIvor\Shop\Tests\Feature;


use Illuminate\Support\Facades\Event;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use ReesMcIvor\Shop\Models\Coupon;
use App\Models\User;

class CouponTest extends TestCase
{
    use RefreshDatabase;

    protected function createCoupons(): void
    {
        Coupon::factory()->create([ 'code' => 'COUPON-CODE', 'type' => 'amount', 'amount' => 10 ]);
    }

    /** @test */
    public function a_coupon_can_be_applied()
    {
        Event::fake();

        $this->createCoupons();
        $this->actingAs(User::factory()->create());
        $this->postJson('/api/shop/coupon/apply', ['code' => 'COUPON-CODE'])
            ->assertOk();
        
        Event::assertDispatchedTimes(\ReesMcIvor\Shop\Events\CouponApplied::class, 1);

    }

    /** @test */
    public function a_coupon_can_fail()
    {
        $this->actingAs(User::factory()->create());
        $this->postJson('/api/shop/coupon/apply', ['code' => 'COUPON-CODE-FAKE'])
            ->assertStatus(404);
    }
}