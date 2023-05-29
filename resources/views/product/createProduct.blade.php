@extends('app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add new Product</h5>
                    <small class="text-muted float-end">Product Entry Form</small>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error )
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="product_name">Product Name</label>
                            <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Product Name & Model" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="product_category_id">Product Category</label>
                            <select name="product_category_id" class="form-select" id="product_category_id">
                                <option selected>Select Product Category</option>
                                @foreach ($categories as $cat )
                                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="product_short_desc">Product Short Description</label>
                            <textarea name="product_short_desc" class="form-control" id="product_short_desc" cols="10" rows="2"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="product_long_desc">Product Long Description</label>
                            <textarea name="product_long_desc" class="form-control" id="product_long_desc" cols="10" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="product_price">Product Price</label>
                            <input type="text" name="product_price" class="form-control" id="product_price" placeholder="Product Price" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="product_name">Product Name</label>
                            <input type="file" name="product_image" class="form-control" id="product_image" />
                        </div>


                        <button type="submit" class="btn btn-sm btn-outline-primary">Save Product</button>
                        <a href="{{ url('product') }}" class="btn btn-sm btn-outline-warning"><< Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
