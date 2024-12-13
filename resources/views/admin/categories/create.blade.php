<x-admin>
    <x-slot name="header">
        <h1>Crearte new Category</h1>
    </x-slot>
    {{-- <form action="{{ route('categories.store')}}" method="post"> --}}
        <form action="{{ route('admin.categories.store')}}" method="post"></form>

        @csrf
        <label for="name">Category name</label>
        <input type="text" id="name" name="name" placeholder="Enter category name">
        <label for="status">Status</label>
        <input type="checkbox" name="status" id="status">
        <input type="submit" value="Create">
    </form>
</x-admin>
