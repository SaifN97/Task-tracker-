@extends('todos.layout')

@section('content')

<div class="flex justify-between border-b pb-4 px-4">
    <h1 class="text-2xl">All Your Todos</h1>
<a href="{{ route('todo.create') }}" class=" mx-5 text-blue-300 cursor-pointer py-2">
<span class="fas fa-plus-circle"/>
</a>
</div>
<ul class="my-5">
    @forelse($todos as $todo)
        <li class="flex justify-between px-4 py-2">
            <div>
                @include('todos.complete-button')
            </div>
            @if($todo->completed)
            <p class="line-through">{{ $todo->title }}</p>
                @else
                <a class="cursor-pointer" href="{{ route('todo.show',$todo->id) }}">{{ $todo->title }}</a>
            @endif
            <div>
                <a href="{{ route('todo.edit', $todo->id) }}" class="px-1 py-1 text-orange-400 cursor-pointer">
                    <span class="fas fa-pen" />
                </a>

                    <span class="fas fa-times text-red-500 cursor-pointer"
                    onclick="event.preventDefault();document.getElementById('form-delete-{{ $todo->id }}').submit()"/>
                
            <form style="display: none" method="POST" id="{{ 'form-delete-'. $todo->id }}" action="{{ route('todo.destroy', $todo->id) }}">
                @csrf
                @method('delete')
            </form>
            </div>
        </li>
        @empty
        <p>No tasks added yet</p>
    @endforelse
</ul>

@stop
