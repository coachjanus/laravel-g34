<x-app-layout>
    <div class="container mx-auto">
        <x-slot name="header">
            <h1>Edit Category {{ $category->name }}</h1>
        </x-slot>

        <form class="max-w-sm mx-auto"  action="{{ route('admin.categories.update', $category->id) }}" method="post">
        @csrf @method('PUT')
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category name</label>
            <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $category->name }}" name="name" class="@error('name') is-invalid @enderror" />
            @error('name')
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                <span class="font-medium">Danger alert!</span> {{ $message }}.        
            </div>
            @enderror
        </div>
        
        <div class="flex items-start mb-5">
            <div class="flex items-center h-5">
            <input id="status" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" name="status" checked={{ $category->status ? "checked" : "" }} />
            </div>
            <label for="status" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Category status (Check this if active)</label>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center ">Update category</button>
        </form>


    
    </div>
</x-app-layout>
