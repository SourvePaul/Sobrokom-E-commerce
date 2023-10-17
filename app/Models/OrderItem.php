<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;
    protected $table="order_items";

    public function order() {
        return $this->hasOne(Order::class);
    }
    
    public function product() {
        return $this->belongsTo(Product::class);
    }
}