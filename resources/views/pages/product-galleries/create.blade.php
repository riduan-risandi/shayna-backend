@extends('layouts.default')
@section('breadcrumbs')
    <div class="breadcrumbs-inner"> 
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Tambah Foto Barang</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8"> 
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Barang</a></li> 
                            <li><a href="#">Foto Barang</a></li> 
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
            <strong> Tambah Foto Barang</strong>
        </div>
        <div class="card-body card -block"> 
            <form method="POST" action="{{ route('product-galleries.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="disabled-input" class=" form-control-label">Nama Barang</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="product_id" class="input-sm form-control-sm form-control @error('product_id') is-invalid @enderror">
                            @foreach ($products as $product)
                                <option value="{{ $product->id}}">{{ $product->name}}</option>
                            @endforeach
                        </select>
                        @error('product_id') <div class="text-muted">{{$message}}</div> @enderror 
                    </div>
                </div> 
                 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="disabled-input" class=" form-control-label">Foto Barang</label>
                    </div>
                    <div class="col-12 col-md-9">
                            <input type="file" name="photo" value="{{old('photo')}}" required accept="image/*" class="input-sm form-control-sm form-control  @error('photo') is-invalid @enderror"> 
                        @error('photo')
                            <div class="text-muted">{{$message}}</div> 
                        @enderror
                    </div>
                </div> 
                
                 

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="disabled-input" class=" form-control-label">Jadikan Default</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <div class="form-check-inline form-check">
                            <label for="inline-radio1" class="form-check-label ">
                                <input type="radio" name="is_default" value="1" class="form-check-input">Ya
                            </label>
                            &nbsp;
                            <label for="inline-radio2" class="form-check-label ">
                                <input type="radio" name="is_default"
                                    value="0" class="form-check-input">Tidak
                            </label> 
                        </div>
                         
                        @error('is_default') <div class="text-muted">{{$message}}</div>  @enderror
                    </div>
                </div> 
                <div class="row form-group"> 
                    <div class="col-12">
                        <a class="btn btn-secondary btn-sm" href="{{ url('/product-galleries') }}" role="button"><i class="fa fa-chevron-left"></i> Kembali</a>
                        &nbsp;
                        <button class="btn btn-primary btn-sm" type="submit"><span class="fa fa-save"></span> Simpan</button>
                    </div>
                </div>  
                 
            </form>

        </div>
    </div>
@endsection

{{-- <script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script> --}}