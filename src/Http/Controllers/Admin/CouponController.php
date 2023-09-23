<?php

namespace ReesMcIvor\Shop\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use ReesMcIvor\Shop\Http\Requests\CouponRequest;
use ReesMcIvor\Shop\Models\Coupon;

class CouponController extends Controller
{

    public function index() : View
    {
        return view('shop::admin/coupons/index',[
            'coupons' => Coupon::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop::admin/coupons/create', [
            'types' => Coupon::TYPES,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(CouponRequest $request)
    {
        $coupon = Coupon::create($request->validated());
        $coupon->users()->sync($request->get("user_ids"));
        return redirect()->route('admin.shop.coupons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('shop::admin/coupons/edit', [
            'coupon' => Coupon::findOrFail($id),
            'types' => Coupon::TYPES,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(CouponRequest $request, $id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->update($request->validated());
        $coupon->users()->sync($request->get("user_ids"));
        return redirect()->route('admin.shop.coupons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Coupon::findOrFail($id)->delete();
        return redirect()->route('admin.shop.coupons.index');
    }
}
