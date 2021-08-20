@extends('layouts.default')

@section('breadcrumbs')
    <div class="breadcrumbs-inner"> 
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Daftar Barang</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8"> 
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Barang</a></li> 
                            <li class="active">Daftar Barang</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    
    <div class="orders">
        <div class="row">
            <div class="col-12"> 
                <div class="card">
                    <div class="card-body">  
                        <a class="btn btn-primary btn-sm" href="{{ url('/products/create') }}" role="button"><i class="fa fa-plus"></i> Tambah</a>
                    </div>  
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-stats order-table ov-h">
                        <table class="table" id="table_id" >
                        {{-- <table id="bootstrap-data-table" class="table table-striped table-bordered"> --}}
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kategori</th>
                                    {{-- <th scope="col">Tipe</th> --}}
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                
                                @Forelse ($items as $key => $item)
                                    <tr> 
                                        <td scope="row">{{ $items->firstItem() + $key }} </td>

                                        <td>{{strtolower($item->name)}}</td>
                                        <td>
                                            @if (!empty($item->category->name)) 
                                            {{ $item->category->name}} 
                                            @else  
                                            @endif
                                        </td> 
                                        {{-- <td>{{$item->type}}</td>  --}}
                                        <td>{{number_format($item->price,2)}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>
                                            <a href="{{ route('products.gallery',$item->id) }}" class="btn btn-info btn-sm"> 
                                                <i class="fa fa-picture-o"></i> 
                                            </a> 
                                            <a href="{{ url('products/edit',$item->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil"></i> 
                                            </a>
                                            <form action="/products/{{$item->id}}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf 
                                                    <button class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i> 
                                                </button>
                                            </form> 
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center p-5">
                                            Data Tidak Tersedia
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="display: flex; justify-content: flex-end">
                
                {{$items->links()}}
            </div>
        </div>
    </div>
@endsection
 