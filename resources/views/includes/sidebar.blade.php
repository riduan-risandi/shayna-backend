 <!-- Left Panel -->
 <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ url('/') }}"><i class
                        ="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Barang</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ url('/item_categories') }}"> <i class="menu-icon fa fa-tags"></i>Kategori Barang</a>
                </li>
                <li class="">
                    <a href="{{ url('/products') }}"> <i class="menu-icon ti ti-package"></i>Barang</a>
                </li>
                <li class="">
                    <a href="{{ route('product-galleries.index') }}"> <i class="menu-icon fa fa-picture-o"></i>Foto Barang</a>
                </li> 
                <li class="menu-title">Pesanan</li> 
                <li class="">
                    <a href="{{ route('transactions.index') }}"> <i class="menu-icon fa fa-shopping-cart"></i>Pesanan</a>
                </li>
                <li class="">
                    <a href="{{ url('/customers') }}"> <i class="menu-icon fa fa-users"></i>Pelanggan</a> 
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->