@extends('inc.master')

@section('title')
    | Create Category
@endsection


@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-10 m-3 mx-auto">
                <h1>Create New Category : </h1>
                <a href="{{ route('categories.index') }}" class="btn btn-success">All Categories</a>
                <hr>

                @if (session('success'))
                    <p class="text-success">{{ session('success') }}</p>
                @endif

                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name') }}" placeholder="Enter Categoy Name .. ">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                </form>



            </div>
        </div>
    </div>
@endsection
