<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subcategory extends Model
{
    use HasFactory, Notifiable;
    use SoftDeletes;

    protected $guarded = [];
    protected $fillables = [
        'cat_id', 'name'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'subcat_id', 'id');
    }
}