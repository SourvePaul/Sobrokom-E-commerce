<?php

namespace App\Models;

use App\Models\User;
use App\Models\Shipping;
use App\Models\OrderItem;
use App\Models\Transcation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table="orders";

    public function items() {
        return $this->hasMany(OrderItem::class);
    }

    public function shipping_address() {
        return $this->hasOne(Shipping::class);
    }
    public function transcation() {
        return $this->hasOne(Transcation::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}