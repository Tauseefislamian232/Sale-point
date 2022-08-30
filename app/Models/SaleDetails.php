<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleDetails extends Model
{
    use HasFactory, Notifiable;
    use SoftDeletes;
    protected $guarded = [];

    protected $fillables = [
        'sale_id',
        'product_id',
        'name',
        'cat_id',
        'subcat_id',
        'price',
        'quantity',
        'rem_qty',
        'sub_total',
        'is_drink',
        'status',
        'order_status',
    ];
}