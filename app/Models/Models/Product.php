<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $table ='product';
    protected $table='products';
    protected $fillable =[
        'name',
        'item_category_id'/* ,'type' */,
        'description',
        'price',
        'slug',
        'quantity', 
        'created_by' ,
        'updated_by',
    ];

    // protected $hidden =[
         
    // ];

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class,'product_id');
    }

    public function category()
    { 
        return $this->hasOne(ItemCategory::class,'id','item_category_id');
        
    }

}
