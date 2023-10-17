<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transcation extends Model
{
    use HasFactory;
    protected $table="transcations";

    public function order() {
        return $this->hasOne(Order::class);
    }
}