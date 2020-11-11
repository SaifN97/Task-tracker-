<div>

    <div class="flex justify-center pb-4 px-4">
        <h2 class="text-lg pb-4">Add steps if required</h2>
    <span wire:click='increment' class="fas fa-plus px-2 py-1 cursor-pointer"/>                
    </div>
@foreach ($steps as $step)
    <div class="flex justify-center py-2" wire:key="{{ $step }}">
        <input type="text" placeholder="{{ 'Describe step '.($step+1)}}" name="steps[]" class="px-1 py-2 border rounded">
        <span class="fas fa-times p-2 text-red-400 cursor-pointer" wire:click='remove({{ $step }})'/>
    </div>
    @endforeach
</div>
