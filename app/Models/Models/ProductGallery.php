<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallery extends Model
{
    // use HasFactory;
    use HasFactory;
    use SoftDeletes;

    // protected $table ='product';
    protected $table='products_galleries';
    protected $fillable =[
        'product_id',
        'photo',
        'is_default',
        'created_by' ,
        'updated_by',
    ];

    // protected $hidden =[
         
    // ];

    public function Product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
        // return $this->belongTo('App/Models/Models/Product');
    }

    public function getPhotoAttribute($value)
    {
         return url('storage/'.$value);
    }
}
