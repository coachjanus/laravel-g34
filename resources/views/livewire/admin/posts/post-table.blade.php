<div>
<x-slot name="header">
        <h1>{{ $title }}</h1>
    </x-slot>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
<div>
    <label for="search" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Search for:</label>
    <input type="text" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Search for product..."  
    wire:model.live.debounce.300ms="search"
    />
        </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3" wire:click="setSort('title')">
                    <button class="flex items-center ml-1">
                        Title
                        @if ($sortBy != 'title')
                        <x-buttons.up-down />
                        @elseif($sortDir == 'ASC')
                        <x-buttons.up />
                        @else
                        <x-buttons.down />
                        @endif
                    </button>
                </th>
                <th scope="col" class="px-6 py-3" wire:click="setSort('status')">
                    <button class="flex items-center ml-1">
                        Status
                        @if ($sortBy != 'status')
                        <x-buttons.up-down />
                        @elseif($sortDir == 'ASC')
                        <x-buttons.up />
                        @else
                        <x-buttons.down />
                        @endif
                    </button>
                </th>
                <th scope="col" class="px-6 py-3" wire:click="setSort('created_at')">
                    <button class="flex items-center ml-1">
                        Created at
                        @if ($sortBy != 'created_at')
                        <x-buttons.up-down />
                        @elseif($sortDir == 'ASC')
                        <x-buttons.up />
                        @else
                        <x-buttons.down />
                        @endif
                    </button>
                </th>
               
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            
            
            <tr class="odd:bg-white even:bg-gray-50 border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $post->title }}
                </th>
                <td class="px-6 py-4">
                {{ $post->status }}
                </td>
                <td class="px-6 py-4">
                {{ $post->created_at }}
                </td>
                
                <td class="px-6 py-4">
                    <div class="inline-flex" role="group">

                    <a href="{{ route('admin.posts.edit',$post) }}">
                    <button class="bg-blue-700 hover:bg-blue-500 text-white">
                    Edit
                    </button>        
                    </a>

                    <button 
                        class="bg-red-700 hover:bg-red-500 text-white"
                        wire:click="deletePost({{$post->id}})"
                        wire:confirm="Are You sure You want delete this post?"
                        >
                    Delete
                    </button>  
                    </div>

                </td>
            </tr>

            @endforeach
            
        </tbody>
    </table>
    {{ $posts->links() }}
</div>


</div>
