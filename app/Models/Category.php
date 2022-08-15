<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable  = [
        'name',
        'slug',
        'description',
        'hot',
        'status',
    ];

    public function products(){
		return $this->hasMany(Product::class);
    }

}
