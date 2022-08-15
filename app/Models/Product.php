<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'content',
        'price',
        'quantity',
        'sale',
        'avatar',
        'price_entry',
        'hot',
        'status',
        'category_id',
        'admin_id',
        'supplier_id',
        'pay',
        'review_total',
        'review_star',
    ];
    public function category(){
		return $this->beLongsto(Category::class);
    }

}
