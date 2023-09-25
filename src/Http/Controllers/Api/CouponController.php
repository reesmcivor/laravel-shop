<?php

namespace ReesMcIvor\Shop\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use ReesMcIvor\Shop\Models\Coupon;
use ReesMcIvor\Shop\Events\CouponApplied;
use ReesMcIvor\Shop\Events\CouponRemoved;

class CouponController extends Controller
{
    public function apply(Request $request)
    {
        $coupon = Coupon::where('code', $request->get('code'))->firstOrFail();

        event(new CouponApplied($coupon));

        return response()->json([
            'message' => 'Applied coupon successfully.',
        ]);
    }

    public function remove(Request $request)
    {
        $coupon = Coupon::where('code', $request->get('code'))->firstOrFail();

        event(new CouponRemoved($coupon));

        return response()->json([
            'message' => 'Removed coupon successfully.'
        ]);
    }
}