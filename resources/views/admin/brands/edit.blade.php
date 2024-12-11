<x-admin>
    <x-slot name="header">
        <h1>Edit brand {{ $brand->name }}</h1>
    </x-slot>
    <div>
        <form action="">
            <div>
                <label for="name">
                    <input type="text" name="name" id="name" value="{{ $brand->name }}">
                </label>
            </div>
            <div>
                <label for="description">
                    <textarea name="description" id="description" value="">{{ $brand->description }}</textarea>
                </label>
            </div>
            <div>
                
                <input type="submit" value="Update">
               
            </div>
        </form>
        
    </div>
</x-admin>