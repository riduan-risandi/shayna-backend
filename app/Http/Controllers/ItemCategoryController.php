<?php

namespace App\Http\Controllers;

use App\Models\Models\ItemCategory;
use App\Models\Models\Product;
use App\Http\Requests\ItemCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemCategoryController extends Controller
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
        $data = ItemCategory::select("id", "name") 
                                ->withCount('Product') 
                                // ->get() 
                                ->paginate(10) ;
                                // ->toArray();
        // dd($data);                 
        return view('pages.item_categories.index')->with([
            'data' => $data, 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.item_categories.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $created_by = Auth::user()->id ; 
        // $name = Auth::user()->name ; 
        $data = $request->all(); 
        $data['created_by'] = $created_by;
 
        ItemCategory::create($data); 
        return redirect('/item_categories/index')->with('status','Kategori Barang Berhasil ditambahkan!'); 
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
        $data = ItemCategory::findOrFail($id);
        return view('pages.item_categories.edit')->with([
            'data' =>$data,
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
    {
        $updated_by = Auth::user()->id ; 
        $data = $request->all(); 
        $data['updated_by'] = $updated_by;
       
        $item = ItemCategory::findOrFail($id); 
        $item->update($data);
        // dd($item->update($data));
        return redirect('/item_categories')->with('status','Kategori Barang Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ItemCategory::destroy($id) ; 
        return redirect('/item_categories')->with('status','Kategori Barang Berhasil dihapus!');
    }
}
