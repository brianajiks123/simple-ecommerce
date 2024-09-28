<div class="page-header">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Category</h2>
    </div>
</div>

{{-- Add Category --}}
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col"></div>
        <div class="col-6 text-center">
            <form action="{{ route('adminAddCategory') }}" method="post">
                @csrf

                <div class="mb-3 d-flex align-items-center">
                    <input type="text" name="category" id="category" class="form-control fs-3 mx-auto"
                        style="flex: 1;">
                    <button type="submit" class="btn btn-primary" style="margin-left: 10px;">Add Category</button>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>

{{-- Show Category --}}
<div class="container mt-3">
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $ctg => $category)
                    <tr>
                        <td>{{ $ctg + 1 }}</td>
                        <td>{{ $category->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
