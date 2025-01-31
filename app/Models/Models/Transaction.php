<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;
 
    protected $table='transactions';
     protected $fillable =[
         'uuid','name','email','number','address','transaction_total','transaction_status'
     ];
 
    //  protected $hidden =[
          
    //  ];

     public function details()
     {
        return $this->hasMany(TransactionDetail::class,'transaction_id');
     }

     
}
