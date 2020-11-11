@extends('todos.layout')

@section('content')


<div class="flex justify-between border-b pb-4 px-4">
    <h1 class="text-2xl pb-4">Edit your todo</h1>

<a href="{{ route('todo.index') }}" class=" mx-5 text-gray-400 cursor-pointer py-2">
<span class="fas fa-arrow-left"/>
</a>
</div>

        <form action="{{ route('todo.update', $todo->id) }}" method="POST">
            @method('put')
            @csrf
            <div class="py-2">
                <input value="{{ $todo->title }}" type="text" name="title" class="px-2 py-2 border rounded">
            </div>
            <div class="py-2">
                <textarea name="description" class="p-2 rounded border" >{{ $todo->description }}</textarea>
            </div>

            <div class="py-2">
                @livewire('edit-step', ['steps' => $todo->steps])
            </div>

            <div class="py-2">
                <input type="submit" value="Update" class="p-2 border rounded">
            </div>
        </form>
    
@stop