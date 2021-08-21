@extends('layouts.default')
@section('breadcrumbs')
    <div class="breadcrumbs-inner"> 
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Pesanan</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8"> 
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Pesanan</a></li> 
                            <li><a href="#">Pelanggan</a></li> 
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
            <strong> Tambah Pelanggan</strong>
        </div>
        <div class="card-body card -block"> 
            <form method="post" action="/customers/store"> 
                @csrf 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label  class=" form-control-label">Nama</label>
                    </div>
                    <div class="col-12 col-md-9"> 
                        <input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <div class="text-muted">{{$message}}</div> 
                        @enderror
                    </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label  class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9"> 
                        <input id="email" placeholder="E-Mail Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <div class="text-muted">{{$message}}</div> 
                        @enderror 
                    </div>
                </div> 
                 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label  class=" form-control-label">No. HP</label>
                    </div>
                    <div class="col-12 col-md-9"> 
                        <input id="number" placeholder="No. Handphone" type="text" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autocomplete="number">
                        @error('number')
                            <div class="text-muted">{{$message}}</div> 
                        @enderror 
                    </div>
                </div> 
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">Password</label>
                    </div>
                    <div class="col-12 col-md-9"> 
                        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <div class="text-muted">{{$message}}</div> 
                        @enderror 
                    </div>
                </div> 
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">Confirm Password</label>
                    </div>
                    <div class="col-12 col-md-9"> 
                        <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"> 
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