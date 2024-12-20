<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
<div>
    <label for="search" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Search for:</label>
    <input type="text" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for user..."  
    wire:model.live.debounce.300ms="search"
    />
        </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3" wire:click="setSort('name')">
                    <button class="flex items-center ml-1">
                        Name
                        @if ($sortBy != 'name')
                        <x-buttons.up-down />
                        @elseif($sortDir == 'ASC')
                        <x-buttons.up />
                        @else
                        <x-buttons.down />
                        @endif
                    </button>
                </th>
                <th scope="col" class="px-6 py-3" wire:click="setSort('email')">
                    <button class="flex items-center ml-1">
                        Email
                        @if ($sortBy != 'email')
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
            @foreach ($users as $user)
            
            
            <tr class="odd:bg-white even:bg-gray-50 border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $user->name }}
                </th>
                <td class="px-6 py-4">
                {{ $user->email }}
                </td>
                <td class="px-6 py-4">
                {{ $user->created_at }}
                </td>
                
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>

            @endforeach
            
        </tbody>
    </table>
    {{ $users->links() }}
</div>

