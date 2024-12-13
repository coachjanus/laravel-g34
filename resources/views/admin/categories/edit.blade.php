<x-admin>
    <x-slot name="header">
        <h1>Edit Category {{ $category->name }}</h1>
    </x-slot>
    {{-- <form action="{{ route('categories.update', $category->id)}}" method="post"> --}}


    <form action="{{ route('admin.categories.update', $category->id)}}" method="post">
        @csrf @method('PUT')
        <label for="name">Category name</label>
        <input type="text" id="name" name="name" value="{{ old($category->name, 'name') }}">
        <label for="status">Status</label>
        <input type="checkbox" name="status" id="status" checked={{ $category->status ? "checked" : "" }}>
        <input type="submit" value="Update">
    </form>
</x-admin>
