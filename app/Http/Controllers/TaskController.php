<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Category;
use App\Models\Task;

class TaskController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('user_id', '=', auth()->user()->id)->get();
        $categories = Category::where('user_id', '=', auth()->user()->id)->get();

        return view('task.index', compact('tasks', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        Task::create([
            'task' => $request->name,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category,
        ]);

        return redirect()->back()->with('success', 'task created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        if ($task->user_id == auth()->user()->id) {
            $task->update([
                'status' => true
            ]);
            return redirect()->back()->with('success', 'task marked done!');
        } else {

            return redirect()->back()->with('error', 'you can not handel this task');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $categories = Category::where('user_id', '=', auth()->user()->id)->get();

        return view('task.edit', compact('task', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update([
            'task' => $request->name,

            'category_id' => $request->category,
        ]);

        return redirect()->back()->with('success', 'task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if ($task->user_id == auth()->user()->id) {
            $task->delete();
            return redirect()->back()->with('success', 'task deleted successfully');
        } else {

            return redirect()->back()->with('error', 'you can not delete this task');
        }
    }
}
