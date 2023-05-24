@extends('inc.master')

@section('title')
    | Tasks
@endsection


@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-10 m-3 mx-auto">
                <h1>All Tasks: </h1>
                <hr>
                @if (session('error'))
                    <p class="text-danger">{{ session('error') }}</p>
                @endif

                @include('task.create_form')
                <hr>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Task</th>
                            <th scope="col">Category</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $task->task }}</td>
                                <td>{{ $task->category->name }}</td>
                                <td @class([
                                    'text-success' => $task->status,
                                    'text-warning' => (!$task->status)
                                    ])>{{ $task->status ? 'completed' : 'not completed' }}</td>
                                <td>
                                    <div class="input-group">
                                        @if (!$task->status)
                                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-success">Done!</a>
                                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-info">Edit</a>
                                        @endif

                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
