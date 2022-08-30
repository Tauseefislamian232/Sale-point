<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory, Notifiable;
    use SoftDeletes;
    protected $guarded = [];

    protected $fillables = [
        'user_id',
        'customer_id',
        'sub_total',
        'discount',
        'total_disc',
        'charges',
        'net_total',
        'status',
        'order_status',
    ];
}