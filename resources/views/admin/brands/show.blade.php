<x-admin>
    <x-slot name="header">
        <h1>This is brand {{ $brand->name }}</h1>
    </x-slot>
    <div>
        <h2>Brand name: {{ $brand->name }}</h2>
        <p>Brand description: {{ $brand->description }}</p>
        <p>Created at: {{ $brand->created_at }}</p>
    </div>
</x-admin>