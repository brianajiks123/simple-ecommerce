<div class="page-header">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Update Category</h2>
    </div>
</div>

{{-- Update Category --}}
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-6 text-center">
            <form action="{{ url('/admin/update-category', $category->id) }}" method="post">
                @csrf

                <div class="mb-3">
                    <input type="text" name="category_name" id="category_name" value="{{ $category->name }}" class="form-control fs-3 mx-auto">
                </div>
                <button type="submit" class="btn btn-primary">Update Category</button>
            </form>
        </div>
    </div>
</div>
