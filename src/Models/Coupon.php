<?php

namespace ReesMcIvor\Shop\Models;

use App\Models\Basket;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use ReesMcIvor\Labels\Database\Factories\LabelFactory;
use ReesMcIvor\Shop\Database\Factories\CouponFactory;

class Coupon extends Model
{

    use HasFactory;
    
    protected static function newFactory()
    {
        return new CouponFactory();
    }

    const TYPES = [
        'amount' => 'Amount',
        'percentage' => 'Percentage',
    ];

    protected $fillable = ['code', 'type', 'amount', 'is_global', 'is_enabled', 'use_limit', 'used_count'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function calculateSavings( Basket $basket )
    {
        switch($this->type)
        {
            case 'amount':
                $discount = $this->amount > $basket->total ? $basket->total : $this->amount;
            break;
            case 'percentage':
                $discount = $basket->total * ($this->amount / 100);
            break;
        }
        return $discount;
    }

    public function isValid( User $user ) : bool
    {
        if($this->users->count()) {
            return $this->users->contains($user);
        }

        return true;
    }
}