@extends('inc.master')

@section('title')
    | Task Edit
@endsection


@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-10 m-3 mx-auto">
                <h1>Edit Task : {{ $task->task }} </h1>
                <hr>
                @if (session('error'))
                    <p class="text-danger">{{ session('error') }}</p>
                @endif


                @if (session('success'))
                    <p class="text-success">{{ session('success') }}</p>
                @endif

                <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="name" class="form-label">Task</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name') ?? $task->task }}">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <select class="form-select" name="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected((old('category') == $category->id) || ($task->category_id == $category->id))>{{ $category->name }}
                                </option>
                            @endforeach

                        </select>

                        @error('category')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary">update</button>
                </form>


            </div>
        </div>
    </div>
@endsection
