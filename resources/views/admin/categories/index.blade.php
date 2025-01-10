<x-app-layout>
  <div class="container mx-auto">
    <x-slot name="header">
        <h1>Categories list</h1>
    </x-slot>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Category name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created at
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{$category->name}}
                    </th>
                    <td class="px-6 py-4">
                    {{$category->status}}
                    </td>
                    <td class="px-6 py-4">
                    {{$category->created_at}}
                    </td>
                    <td class="px-6 py-4 inline-flex">
                        <a href="{{ route('admin.categories.edit', $category->id) }}"><button class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Edit</button></a>&nbsp;
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post" style="display:inline-block; margin:auto;">
                            @csrf @method('DELETE')
                            <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            
            </tbody>
        </table>
    </div>

    {{ $categories->links() }}

  </div>
</x-app-layout>
