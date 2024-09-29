<div class="page-header">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Update Product</h2>
    </div>
</div>

{{-- Update Product --}}
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-10">
            <form action="{{ url('/admin/update-product', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4 text-end">
                                <label for="title" class="col-form-label">Product Title</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" name="title" id="title" class="form-control fs-3"
                                    placeholder="title" value="{{ $product->title }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="row">
                            <div class="col-4 text-end">
                                <label for="category" class="col-form-label">Category</label>
                            </div>
                            <div class="col-auto">
                                <select name="category" id="category" class="form-control">
                                    <option value="{{ $product->category }}" selected>{{ $product->category }}</option>

                                    @foreach ($categories as $category)
                                        @if ($category->name != $product->category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4 text-end">
                                <label for="price" class="col-form-label">Price (Rp)</label>
                            </div>
                            <div class="col-auto">
                                <input type="number" name="price" id="price" class="form-control fs-3"
                                    placeholder="price" value="{{ $product->price }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="row">
                            <div class="col-4 text-end">
                                <label for="quantity" class="col-form-label">Qty.</label>
                            </div>
                            <div class="col-auto">
                                <input type="number" name="quantity" id="quantity" class="form-control fs-3"
                                    placeholder="quantity" value="{{ $product->quantity }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4 text-end">
                                <label for="description" class="col-form-label">Description</label>
                            </div>
                            <div class="col-auto">
                                <textarea name="description" id="description" class="form-control fs-3" rows="3" placeholder="description"
                                >{{ $product->description }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="row">
                            <div class="col-4 text-end">
                                <label for="image" class="col-form-label">Image</label>
                                <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->title }}"
                                    height="120" width="120" class="img-fluid mx-auto d-block mb-2">
                            </div>
                            <div class="col-auto">
                                <input type="file" name="image" id="image" class="form-control"
                                    accept="image/png, image/jpeg">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
