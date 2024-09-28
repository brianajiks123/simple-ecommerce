<div class="page-header">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Product</h2>
    </div>
</div>

{{-- Add Product --}}
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-10">
            <form action="{{ route('adminStoreProduct') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4 text-end">
                                <label for="title" class="col-form-label">Product Title</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" name="title" id="title" class="form-control fs-3"
                                    placeholder="title" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="row">
                            <div class="col-4 text-end">
                                <label for="category" class="col-form-label">Category</label>
                            </div>
                            <div class="col-auto">
                                <select name="category" id="category" class="form-control" required>
                                    <option selected>-- Select Category --</option>

                                    @foreach ($categories as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
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
                                <label for="price" class="col-form-label">Price</label>
                            </div>
                            <div class="col-auto">
                                <input type="number" name="price" id="price" class="form-control fs-3"
                                    placeholder="price" required>
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
                                    placeholder="quantity" required>
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
                                <textarea name="description" id="description" class="form-control fs-3" rows="3" placeholder="description" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="row">
                            <div class="col-4 text-end">
                                <label for="image" class="col-form-label">Image</label>
                            </div>
                            <div class="col-auto">
                                <input type="file" name="image" id="image" class="form-control" accept="image/png, image/jpeg" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Show Product --}}
{{-- <div class="container mt-3">
    <div class="table-responsive">
        <table class="table table-sm table-hover text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Edit / Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $ctg => $category)
                    <tr>
                        <td>{{ $ctg + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ url('/admin/edit-category', $category->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ url('/admin/delete-category', $category->id) }}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div> --}}
