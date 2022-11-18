<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Models\Courier;
use App\Models\Models\City;
use App\Models\Models\Province;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class OngkirController extends Controller
{
    public function provinces()
    {
        // $couriers = Courier::pluck('title', 'code');
        // $provinces = Province::pluck('title', 'province_id');
        $provinces =Province::all('title', 'province_id');
 
        if($provinces)
        {
            return ResponseFormatter::success($provinces, 'Data Provinsi Berhasil Diambil');
        }   
        else 
        { 
            return ResponseFormatter::error(null, 'Data Provinsi Tidak ada');
        } 

    }

    public function couriers()
    {
        // $couriers = Courier::pluck('title', 'code'); 
        $couriers = Courier::all('title', 'code'); 
 
        if($couriers)
        {
            return ResponseFormatter::success($couriers, 'Data Kurir Berhasil Diambil');
        }   
        else 
        { 
            return ResponseFormatter::error(null, 'Data Kurir Tidak ada');
        } 

    }
 
    // public function getCities(Request $request, $id) 
    public function getCities(Request $request) 
    {  
        $id = $request->input('id');
        if($id)
        {
            // $city = City::where('province_id',$id )->pluck('title','city_id' );
            $city =  City::where('province_id', $id)->get(['title','city_id']);
            if($city)
            {
                return ResponseFormatter::success($city, 'Data Kota Berhasil Diambil');
            }
            else 
            { 
                return ResponseFormatter::error(null, 'Data Kota Tidak ada');
            } 
        }
 
    }

    public function cekOngkir(Request $request)
    {  
       
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => $request->city_origin,     // ID kota/kabupaten asal
            'destination'   => $request->city_destination,      // ID kota/kabupaten tujuan
            'weight'        => $request->weight,     // berat barang dalam gram
            'courier'       => $request->courier,     // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();

        // dd($cost);
        if(!empty($cost))
        { 
            return ResponseFormatter::success($cost, 'Data Ongkos Kirim Berhasil Diambil');
        }
        else 
        { 
            return ResponseFormatter::error(null, 'Data Ongkos Kirim Tidak ada');
        }  
         
    }

    public function cekOngkir2(Request $request)
    {  
        // dd($request);
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => 154,     // ID kota/kabupaten asal / Jakarta Timur
            'destination'   => $request->city_destination,      // ID kota/kabupaten tujuan
            'weight'        => 900,     // berat barang dalam gram
            // 'weight'        => $request->weight,     // berat barang dalam gram
            'courier'       => $request->courier,     // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();

        
        foreach ($cost[0]["costs"] as $row => $val) 
        {
            $detail[] =  [
                'service' => $val["service"],
                'description' => $val["description"], 
                'cost' => $val["cost"][0]["value"], 
                'fullname' => $val["service"].' ('.$val["cost"][0]["etd"].' days)'.' - Rp.'.number_format($val["cost"][0]["value"]), 
                // 'fullname' => $val["service"].' - Rp.'.number_format($val["cost"][0]["value"]), 
            ];
 
        }

        // dd($cost);
        if(!empty($detail))
        { 
            return ResponseFormatter::success($detail, 'Data Ongkos Kirim Berhasil Diambil');
        }
        else 
        { 
            return ResponseFormatter::error(null, 'Data Ongkos Kirim Tidak ada');
        }  
         
    }
}
