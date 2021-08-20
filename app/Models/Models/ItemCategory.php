<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =[
        'name',
        'created_by' ,
        'updated_by'
    ];

    public function product()
    { 
        return $this->hasMany(Product::class,'item_category_id');

    }

}
