<div class="page-header">
    <div class="container-fluid d-flex">
        <div class="col text-start">
            <h2 class="h5 no-margin-bottom">Product</h2>
        </div>

        <div class="col text-end">
            <form action="{{ route('adminSearchProduct') }}" method="get">
                @csrf

                <div class="row">
                    <div class="col-8">
                        <input type="search" name="search_product" id="search_product" class="form-control fs-3" placeholder="search product">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-outline-secondary">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Show Product --}}
<div class="container mt-3">
    <div class="table-responsive">
        <table class="table table-sm table-hover text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price (Rp)</th>
                    <th>Qty.</th>
                    <th>Edit / Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $prd => $product)
                    <tr>
                        <td>{{ $prd + 1 }}</td>
                        <td class="align-middle">
                            <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->title }}"
                                height="120" width="120" class="img-fluid mx-auto d-block">
                        </td>
                        <td class="align-middle">{{ $product->title }}</td>
                        {{-- limit for character or words for text --}}
                        <td class="align-middle">{!! Str::limit($product->description, 10, '...') !!}</td>
                        <td class="align-middle">{{ $product->category }}</td>
                        <td class="align-middle">{{ $product->price }}</td>
                        <td class="align-middle">{{ $product->quantity }}</td>
                        <td class="align-middle">
                            <a href="{{ url('/admin/edit-product', $product->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ url('/admin/delete-product', $product->id) }}" class="btn btn-danger"
                                onclick="confirmation(event)">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4 d-flex justify-content-center align-items-center">
            {{ $products->onEachSide(1)->links() }}
        </div>
    </div>
</div>
