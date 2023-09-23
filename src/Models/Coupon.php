<?php

namespace ReesMcIvor\Shop\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Coupon extends Model
{
    const TYPES = [
        'amount' => 'Amount',
        'percentage' => 'Percentage',
    ];

    protected $fillable = ['code', 'type', 'amount', 'is_global', 'is_enabled', 'use_limit', 'used_count'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}