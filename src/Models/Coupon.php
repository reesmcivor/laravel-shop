<?php

namespace ReesMcIvor\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['code', 'type', 'value', 'is_global', 'is_enabled', 'use_limit', 'used_count'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}