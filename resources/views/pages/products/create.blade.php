@extends('layouts.default')
@section('breadcrumbs')
    <div class="breadcrumbs-inner"> 
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Tambah Barang</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8"> 
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Barang</a></li> 
                            <li><a href="#">Daftar Barang</a></li> 
                            <li class="active">Tambah</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    
    <div class="card">
        <div class="card-header">
            {{-- <i class="menu-icon fa fa-list"></i> --}}
            <strong> Tambah Barang</strong>
        </div>
        <div class="card-body card -block">
            {{-- <form action="{{route('products/store')}}" method="POST">  --}}
            {{-- <form method="POST" action="{{ route('product.store')}}" enctype="multipart/form-data"> --}}
            <form method="post" action="/products/store"> 
                @csrf 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="disabled-input" class=" form-control-label">Nama Barang</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="name" value="{{old('name')}}" class="input-sm form-control-sm form-control @error('name') is-invalid @enderror"> 
                        @error('name')
                            <div class="text-muted">{{$message}}</div> 
                        @enderror
                    </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="disabled-input" class=" form-control-label">Kategori</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="item_category_id" class="input-sm form-control-sm form-control @error('item_category_id') is-invalid @enderror">
                            @foreach ($category as $row)
                                <option value="{{ $row->id}}">{{ $row->name}}</option>
                            @endforeach
                        </select>
                        @error('item_category_id') <div class="text-muted">{{$message}}</div> @enderror
                    </div>
                </div>
                {{-- <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="disabled-input" class=" form-control-label">Tipe Barang</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="type" value="{{old('type')}}" class="input-sm form-control-sm form-control @error('type') is-invalid @enderror"> 
                        @error('type')
                            <div class="text-muted">{{$message}}</div> 
                        @enderror
                    </div>
                </div> --}}
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="disabled-input" class=" form-control-label">Deskripsi</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="description" id="ckeditor" class="input-sm form-control-sm form-control @error('type') is-invalid @enderror">{{old('description')}}</textarea>
                        @error('description')
                            <div class="text-muted">{{$message}}</div> 
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="disabled-input" class=" form-control-label">Harga</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" name="price" value="{{old('price')}}" class="input-sm form-control-sm form-control @error('price') is-invalid @enderror"> 
                        @error('price')
                            <div class="text-muted">{{$message}}</div> 
                        @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="disabled-input" class=" form-control-label">Jumlah</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" name="quantity" value="{{old('quantity')}}" class="input-sm form-control-sm form-control @error('quantity') is-invalid @enderror"> 
                        @error('quantity')
                            <div class="text-muted">{{$message}}</div> 
                        @enderror
                    </div>
                </div> 
                <div class="row form-group"> 
                    <div class="col-12">
                        <a class="btn btn-secondary btn-sm" href="{{ url('/products') }}" role="button"><i class="fa fa-chevron-left"></i> Kembali</a>
                        &nbsp;
                        <button class="btn btn-primary btn-sm" type="submit"><span class="fa fa-save"></span> Simpan</button>
                    </div>
                </div>  
                {{-- <div class="form-group">
                    <BR>
                    <button class="btn btn-primary btn-block" type="submit"> Tambah Barang</button>
                </div> --}}
            </form>

        </div>
    </div>
@endsection