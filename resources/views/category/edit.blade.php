@extends('inc.master')

@section('title')
    | Edit Category
@endsection


@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-10 m-3 mx-auto">
                <h1>Edit Category : {{ $category->name }}</h1>
                <a href="{{ route('categories.index') }}" class="btn btn-success">All Categories</a>
                <hr>

                @if (session('success'))
                    <p class="text-success">{{ session('success') }}</p>
                @endif

                <form method="POST" action="{{ route('categories.update', $category->id) }}">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $category->name }}"
                            >
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>



            </div>
        </div>
    </div>
@endsection
