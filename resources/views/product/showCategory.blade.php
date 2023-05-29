@extends('app')
@section('content')

<!-- Basic Bootstrap Table -->
<div class="container mt-5">
    <div class="card">
        <h5 class="card-header">Show all category</h5>
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
                        <th>Category Name</th>
                        <th>Category Product Count</th>
                        <th>Category Slug</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($categories as $category )

                    <tr>
                        <td>{{ $category->id }}</td>
                        <td><strong>{{ $category->category_name }}</strong></td>
                        <td>{{ $category->category_product_count }}</td>
                        <td>{{ $category->category_slug }}</td>
                        <td>
                            <form method="post" action="{{ route('category.delete', $category->id) }}">
                            <a class="btn btn-outline-primary btn-sm" href="{{ route('category.edit', $category->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach

                </tbody>



            </table>
            <div class="mt-3 mb-3">
                <a class="btn btn-outline-success btn-sm" href="{{ route('category.create') }}">Add Category</a>
            </div>
        </div>
    </div>
</div>

@endsection
