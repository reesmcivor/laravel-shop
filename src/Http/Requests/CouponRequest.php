<?php

namespace ReesMcIvor\Shop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'code' => 'required|string|unique:coupons,code,' . $this->route('coupon'),
            'type' => 'required|in:amount,percentage',
            'amount' => 'required|numeric',
        ];
    }

}
