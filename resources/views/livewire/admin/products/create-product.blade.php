<div class="px-5">
    <x-slot name="header">
        <h1>{{ $title }}</h1>
    </x-slot>
    <div class="py-12">
        <form wire:submit="save" class="nmax-w-sm mx-auto">
            <div class="mb-5">
                <label for="name" class="block mb-2 text-gray-900">Product name</label>
                <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900" wire:model="form.name" required placeholder="Enter product name">
                <div>
                    @error('form.name') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-5">
            <label for="price" class="block mb-2 text-gray-900">Product price</label>
            <input type="number" id="priceext-gray-900" wire:model="form.price" required placeholder="Enter product price">
                <div>
                    @error('form.price') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-5">
                <label for="description" class="block mb-2 text-gray-900">Product description</label>
                <textarea wire:model="form.description" required  id="description" class="block p-2,5 text-gray-900 border border-gray-300" rows="4"></textarea>
                <div>
                    @error('form.description') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <fieldset>
                <legend class="sr-only">Status</legend>
                <div class="flex items-center justify-between mb-4">
                    @foreach ($productStatus as $status)
                    <input type="radio" wire:model="form.status" value="{{$status->value}}" id="status">
                    <label for="status" class="block mb-2 text-gray-900">{{ $status->name}}</label>
                    
                    @endforeach
                </div>
            </fieldset>

            <button type="submit" class="bg-blue-700 text-white px-5 py-2.5">Save</button>

        </form>
    </div>
</div>
