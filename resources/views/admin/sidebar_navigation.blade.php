<!-- Sidebar Navigation-->
<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{ asset('admin/img/avatar-6.jpg') }}" alt="..."
                class="img-fluid rounded-circle">
        </div>
        <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li>
            <a href="{{ route('adminHome') }}"> <i class="icon-home"></i>Home </a>
        </li>
        <li>
            <a href="{{ route('adminViewCategory') }}"> <i class="icon-grid"></i>Category </a>
        </li>
        <li>
            <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i
                    class="icon-windows"></i>Products</a>

            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ route('adminAddProduct') }}">Add Product</a></li>
                <li><a href="{{ route('adminShowProduct') }}">Show Product</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('adminShowOrder') }}"> <i class="icon-grid"></i>Order Product</a>
        </li>
    </ul>
</nav>
<!-- Sidebar Navigation end-->
