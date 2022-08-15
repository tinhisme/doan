<?php

namespace App\Models;

use App\Models\Type;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attribute extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'type_id',
    ];

    public function type(){
		return $this->belongsTo(Type::class);
    }

    public function category(){
		return $this->belongsTo(Category::class);
    }

}
