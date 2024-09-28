<div class="page-header">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Category</h2>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-3"></div>
        <div class="col-6 text-center">
            <form action="{{ route('adminAddCategory') }}" method="post">
                @csrf
        
                <div class="mb-3">
                    <input type="text" name="category" id="category" class="form-control fs-3 mx-auto">
                </div>
                <div class="mb-">
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </div>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>
