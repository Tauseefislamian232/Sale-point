<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlaceOrder extends Model
{
    use HasFactory, Notifiable;
    use SoftDeletes;
    protected $guarded = [];

    protected $fillables = [
        'user_id',
        'product_id',
        'cat_id',
        'image_id',
        'price',
        'quantity',
        'total',
        'discount',
        'net_total',
        'remaining_quantity',
        'is_drink',
        'status',
    ];
}