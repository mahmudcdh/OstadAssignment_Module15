@extends('app')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update category</h5>
                    <small class="text-muted float-end">Category Update Form</small>
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
                    <form method="post" action="{{ route('category.update', $cat_info->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $cat_info->id }}">
                        <div class="mb-3">
                            <label class="form-label" for="category_name">Category Name</label>
                            <input type="text" name="category_name" class="form-control" id="category_name" value="{{ $cat_info->category_name }}" />
                        </div>

                        <button type="submit" class="btn btn-sm btn-outline-primary">Update Category</button>
                        <a href="{{ url('category') }}" class="btn btn-sm btn-outline-warning"><< Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
