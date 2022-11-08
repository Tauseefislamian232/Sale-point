<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Notifiable;
    use SoftDeletes;
    protected $guarded = [];

    protected $fillables = [
        'name', 'cat_id', 'subcat_id', 'price', 'quantity', 'is_drink'
    ];

    public function product_with_category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function product_with_subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcat_id', 'id');
    }
    public function product_with_image()
    {
        return $this->hasOne(ProductImage::class, 'product_id', 'id');
    }
}