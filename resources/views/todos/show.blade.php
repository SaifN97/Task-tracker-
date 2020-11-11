@extends('todos.layout')

@section('content')

<div class="flex justify-between border-b pb-4 px-4">
    <h1 class="text-2xl pb-4">{{ $todo->title }}</h1>
<a href="{{ route('todo.index') }}" class=" mx-5 text-gray-400 cursor-pointer py-2">
<span class="fas fa-arrow-left"/>
</a>
</div>

<div class="py-2">
    <h3 class='text-lg'>Description</h3>
    <p>{{ $todo->description }}</p>
</div>

@if ($todo->steps->count()> 0)
<div class="py-4">
    <h3 class="text-lg">Steps for this task</h3>
    @foreach ($todo->steps as $step)
        <p>{{ $step->name }}</p>
    @endforeach
</div>
@endif
    
@stop