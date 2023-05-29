@extends('app')
@section('content')

<!-- Basic Bootstrap Table -->
<div class="container mt-5">
    <div class="card">
        <h5 class="card-header">Show all product</h5>
        @if (session()->has('msg'))
        <div class="alert alert-success">
            {{ session()->get('msg') }}
        </div>
        @endif
        <div class="container mt-3 table-responsive text-nowrap">
            <table class="table table-sm table-bordered table-rounded">
                <thead class="table-success">
                    <tr>
                        <th>Sl#</th>
                        <th>Product Name</th>
                        <th>Category Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($products as $product )

                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><strong>{{ $product->product_name }}</strong></td>
                        <td><strong>{{ $product->product_category_name }}</strong></td>
                        <td>{{ $product->product_price }}</td>
                        <td>
                            <a class="btn btn-outline-primary btn-sm" href="">Edit</a>
                            <a class="btn btn-outline-danger btn-sm" href="">Delete</a>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
            <div class="mt-3 mb-3">
                <a class="btn btn-outline-success btn-sm" href="{{ route('product.create') }}">Add Product</a>
            </div>
        </div>
    </div>
</div>

@endsection
