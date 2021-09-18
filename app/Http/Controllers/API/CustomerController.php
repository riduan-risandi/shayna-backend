<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
// use App\Http\Requests\API\RegisterRequest;
use App\Models\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // public function get(Request $request)
    public function get(Request $request, $id)
    { 
        $data = Customer::findOrFail($id); 
        // dd($id);
        if($data)
        {
            return ResponseFormatter::success($data,'Data Customer berhasil diambil '.$id.'');
        } 
        else
        { 
            return ResponseFormatter::error(null,'Data Customer tidak ada',404);
        }


    } 
 
}
