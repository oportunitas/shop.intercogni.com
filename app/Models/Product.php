<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;



class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name', 'description', 'price', 'stock_quantity','slug','category_id','brand_id',];

    protected $with = ['brand','category'];
    
   
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
