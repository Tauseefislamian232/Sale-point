<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, Notifiable;
    use SoftDeletes;
    protected $guarded = [];
    protected $fillables = ['name'];

    public function category_with_subcategory()
    {
        return $this->hasMany(Subcategory::class, 'cat_id', 'id');
    }
    // public function subcategory()
    // {
    //     return $this->hasMany(Subcategory::class, 'cat_id', 'id');
    // }

    // public function products()
    // {
    //     return $this->hasMany(Product::class, 'cat_id', 'id');
    // }
}