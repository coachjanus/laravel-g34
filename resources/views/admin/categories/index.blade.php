<x-admin>
    <x-slot name="header">
        <h1>Categories list</h1>
    </x-slot>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Created</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr style="@if ($loop->even) background-color:lightgray; @endif">
                <td>{{$category->name}}</td>
                <td>{{$category->status}}</td>
                <td>{{$category->created_at}}</td>
                <td style="display:flex; align-items:center;">
                    {{-- <a href="{{ route('categories.edit', $category->id) }}"><button>Edit</button></a> --}}
                    <a href="{{ route('admin.categories.edit', $category->id) }}"><button>Edit</button></a>
                    
                    {{-- <form action="{{ route('categories.destroy', $category->id) }}" method="post" style="display:inline-block; margin:auto;">
                        @csrf @method('DELETE')
                        <button type="submit">Delete</button>
                    </form> --}}
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post" style="display:inline-block; margin:auto;">
                        @csrf @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>



                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
</x-admin>
