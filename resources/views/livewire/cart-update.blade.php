<div>
    <input wire:model="quantity"
           type="number" onkeypress="return event.charCode >= 48" min="1"
           wire:change="updateCart" class="text-center">
</div>
