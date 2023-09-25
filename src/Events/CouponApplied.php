<?php

namespace ReesMcIvor\Shop\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use ReesMcIvor\Shop\Models\Coupon;

class CouponApplied
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Coupon $coupon;

    public function __construct( Coupon $coupon )
    {
        $this->coupon = $coupon;
    }
}
