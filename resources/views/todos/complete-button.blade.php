@if($todo->completed)
<span class="fas fa-check text-green-400 cursor-pointer px-2"
onclick="event.preventDefault();document.getElementById('form-incomplete-{{ $todo->id }}').submit()"/>

<form style="display: none" method="POST" id="{{ 'form-incomplete-'. $todo->id }}" action="{{ route('todo.incomplete', $todo->id) }}">
    @csrf
    @method('put')
</form>
@else
<span class="fas fa-check text-gray-300 cursor-pointer px-2" 
onclick="event.preventDefault();document.getElementById('form-complete-{{ $todo->id }}').submit()"/>

<form style="display: none" method="POST" id="{{ 'form-complete-'. $todo->id }}" action="{{ route('todo.complete', $todo->id) }}">
    @csrf
    @method('put')
</form>
@endif
