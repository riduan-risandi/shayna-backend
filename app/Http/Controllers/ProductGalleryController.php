<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductGalleryRequest;
use App\Models\Models\Product;
use App\Models\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductGalleryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = ProductGallery::with('product')->get();
        $items = ProductGallery::with('product')
                                ->orderBy('id','DESC')
                                ->paginate(10);
                                 // ->get()  
                                // ->toArray();
        
        return view('pages.product-galleries.index')->with([
            'items'=>$items
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();

        return view('pages.product-galleries.create')->with([
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    // public function store(ProductGalleryRequest $request)
    { 
        $id_login = Auth::user()->id ; 
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store(
            '/asset/product','public'
        );
        $data['created_by'] = $id_login; 

        // dd( $data['photo']);


        ProductGallery::create($data);
        // return redirect()->route('product-galleries');
        // return redirect()->route('product-galleries.index');
        return redirect()->route('product-galleries.index')->with('status','Foto Barang Berhasil ditambahkan!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = ProductGallery::findOrFail($id);
        $items->delete();
        return redirect()->route('product-galleries.index');
    }

    
}
