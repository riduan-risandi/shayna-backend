<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    
    protected $table='transactions_detail';
    protected $fillable =[
        'product_id','transaction_id'
    ];

    protected $hidden =[
         
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class,'id','transaction_id'); 
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id'); 
    }
}
