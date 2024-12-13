<x-admin>
    <x-slot name="header">
        <h1>This is category {{ $category->name }}</h1>
    </x-slot>
    <div>
        <h2>Category name: {{ $category->name }}</h2>
        <p>Category status: {{ $category->status }}</p>
        <p>Created at: {{ $category->created_at }}</p>
    </div>
</x-admin>