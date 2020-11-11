@extends('todos.layout')

@section('content')

<div class="flex justify-between border-b pb-4 px-4">
    <h1 class="text-2xl pb-4">What next you need To-Do</h1>
<a href="{{ route('todo.index') }}" class=" mx-5 text-gray-400 cursor-pointer py-2">
<span class="fas fa-arrow-left"/>
</a>
</div>
        <form action="{{ route('todo.store') }}" method="POST">
            @csrf
            <div class="py-1">
                <input type="text" placeholder="Title" name="title" class="px-2 py-2 border rounded">
            </div>

            <div class="py-1">
                <textarea name="description" class="p-2 rounded border" placeholder="Description"></textarea>
            </div>
            <div class="py-2">
@livewire('step')
            </div>
            <div class="py-1">
                <input type="submit" value="Create" class="p-2 border rounded">
            </div>
        </form>
    
@stop