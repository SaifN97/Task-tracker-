<div>

    <div class="flex justify-center pb-4 px-4">
        <h2 class="text-lg pb-4">Add steps if required</h2>
    <span wire:click='increment' class="fas fa-plus px-2 py-1 cursor-pointer"/>                
    </div>
@foreach ($steps as $step)
    <div class="flex justify-center py-2" wire:key="{{ $loop->index }}">
        <input type="text" placeholder="{{ 'Describe step '.($loop->index+1)}}" name="stepsName[]"
        value="{{ $step['name'] }}" class="px-1 py-2 border rounded">
        <input type="hidden" name="stepId[]" value="{{ $step['id'] }}">
        <span class="fas fa-times p-2 text-red-400 cursor-pointer" wire:click='remove({{ $loop->index }})'/>
    </div>
    @endforeach
</div>
