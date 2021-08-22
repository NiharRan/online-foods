<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'sub_title', 
        'slug', 
        'image', 
        'product_type_id', 
        'brand_id', 
        'details', 
        'price', 
        'status',
    ];

    public function getProductImageAttribute()
    {
        return public_path("storage/products/$this->image");
    }

    public function getProductUrlAttribute()
    {
        return route('products.profile', $this->slug);
    }

    protected $appends = [
        'product_image', 'product_url'
    ];


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
