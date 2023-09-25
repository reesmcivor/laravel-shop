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
        if($coupon->isValid($request->user())) {
            event(new CouponApplied($coupon));
            return response()->json([
                'message' => 'Applied coupon successfully.',
            ]);
        }

        return response()->json([
            'message' => 'Coupon is not valid.',
        ], 422);
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