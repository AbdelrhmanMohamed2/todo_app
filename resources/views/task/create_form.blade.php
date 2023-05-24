@if (session('success'))
    <p class="text-success">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('tasks.store') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Task</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
            placeholder="Enter your Task .. ">
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <select class="form-select" name="category">
            <option selected>Open this select menu</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category') == $category->id)>{{ $category->name }}</option>
            @endforeach

        </select>

        @error('category')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>


    <button type="submit" class="btn btn-primary">Add</button>
</form>
