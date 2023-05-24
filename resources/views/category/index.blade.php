@extends('inc.master')

@section('title')
    | Categories
@endsection


@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-10 m-3 mx-auto">
                <h1>All Categories: </h1>
                <a href="{{ route('categories.create') }}" class="btn btn-success">Create New Category</a>
                <hr>
                @if (session('error'))
                <p class="text-danger">{{ session('error') }}</p>

                @endif

                @if (session('success'))
                    <p class="text-success">{{ session('success') }}</p>
                @endif
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Count</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->tasks_count}}</td>
                                <td>
                                    {{-- <div class="input-group"> --}}
                                    <a href="{{route('categories.edit', $category->id)}}" class="btn btn-info">Edit</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                    </form>
                                    {{-- </div> --}}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
