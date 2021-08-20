@extends('layouts.default')
@section('breadcrumbs')
    <div class="breadcrumbs-inner"> 
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Tambah Kategori Barang</h1>
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
            {{-- <h4 class="box-title"> Tambah Kategori Barang </h4> --}}
            <strong> Tambah Kategori Barang</strong>
        </div>
        <div class="card-body card -block"> 
            <form method="post" action="/item_categories/store"> 
                @csrf 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="disabled-input" class=" form-control-label">Nama</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="name" value="{{old('name')}}" class="input-sm form-control-sm form-control @error('name') is-invalid @enderror"> 
                        @error('name')
                            <div class="text-muted">{{$message}}</div> 
                        @enderror
                    </div>
                </div> 
                 
                <div class="row form-group"> 
                    <div class="col-12">
                        <a class="btn btn-secondary btn-sm" href="{{ url('/item_categories') }}" role="button"><i class="fa fa-chevron-left"></i> Kembali</a>
                        &nbsp;
                        <button class="btn btn-primary btn-sm" type="submit"><span class="fa fa-save"></span> Simpan</button>
                    </div>
                </div>   
            </form>

        </div>
    </div>
@endsection