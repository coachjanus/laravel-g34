<x-admin>
    <x-slot name="header">
        <h1>Create new brand</h1>
    </x-slot>
    <div>
        <form action="">
            <div>
                <label for="name">
                    <input type="text" name="name" id="name" placeholder="Ender brand name">
                </label>
            </div>
            <div>
                <label for="description">
                    <textarea name="description" id="description" placeholder="Ender brand description"></textarea>
                </label>
            </div>
            <div>
                
                <input type="submit" value="Create">
               
            </div>
        </form>
        
    </div>
</x-admin>