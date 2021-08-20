<?php

namespace App\Http\Controllers;

use App\Models\Models\Product;
use App\Models\Models\ProductGallery;
use App\Models\Models\ItemCategory;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
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
        // $data = DB::table('products')
        //                 ->leftJoin('item_categories', 'products.item_category_id', '=', 'item_categories.id')
        //                 ->select('products.*', 'item_categories.name as  item_category_name')
        //                 ->paginate(10);

        

        // $users = Product::select("id", "name") 
        //                 ->with('category') 
        //                 ->get() 
        //                 // ->paginate(10) ;
        //                 ->toArray(); 

        $items = Product::with('category') 
                            ->paginate(10) ; 
        // dd($items);    
        return view('pages.products.index', compact('items'));
        // return view('pages.products.index')->with([
        //     'items' => $items
        // ]);
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $category = ItemCategory::select("id", "name")  
                                ->get()  ;
                                // ->toArray();

        return view('pages.products.create')->with([
            'category' => $category
        ]);
 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request::all();
        // $data['slug'] = Str::slug($request->name);

        // Product::create($data);
        // return redirect()->route('products/index');
        $created_by = Auth::user()->id ; 
        $validated = $request->validate([
            'name'                  => 'required|max:255',
            'item_category_id'      => 'required|integer',
            // 'type'                  => 'required|max:255',
            'description'           => 'required',
            'price'                 => 'required|integer',
            'quantity'              => 'required|integer', 
        ]);
        // $request['slug'] = Str::slug('Laravel 5 Framework', '-');
        $request['slug'] = Str::slug($request->name);
        $request['created_by'] = $created_by; 
        // dd($request);
        Product::create($request->all());
        
        return redirect('/products/index')->with('status','Data Barang Berhasil ditambahkan!');
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
        $items = Product::findOrFail($id);
        $category = ItemCategory::select("id", "name")  
                                ->get()  ;
        return view('pages.products.edit')->with([
            'item' =>$items,
            'category' =>$category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    // public function update(Request $request, Product $id)
    {
        $id_login = Auth::user()->id ; 
        $validated = $request->validate([
            'name'              => 'required|max:255',
            'item_category_id'  => 'required|integer',
            // 'type'              => 'required|max:255',
            'description'       => 'required',
            'price'             => 'required|integer',
            'quantity'          => 'required|integer',
        ]);
        $request['slug'] = Str::slug($request->name); 
        Product::where('id', $id)
                     ->update
                     ([
                        'name' => $request->name,
                        'item_category_id' => $request->item_category_id,
                        // 'type' => $request->type,
                        'description' => $request->description,
                        'price' => $request->price,
                        'quantity' => $request->quantity,
                        'slug' => $request->slug,
                        'updated_by' => $id_login,
                     ]);


        return redirect('/products')->with('status','Data Product Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id) ;
        // ProductGallery::destroy($id) ;
        ProductGallery::where('product_id',$id)->delete();
        return redirect('/products')->with('status','Data Product Berhasil dihapus!');
    }

    public function gallery(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        // $items = Product::paginate(10);  

        // $items = ProductGallery::with('product')->paginate(10);
        $items = ProductGallery::with('product')
           
            ->where('product_id',$id)
            
            ->get();

        return view('pages.products.gallery')->with([
            'product' =>$product,
            'items' =>$items,
        ]);
    }
}
