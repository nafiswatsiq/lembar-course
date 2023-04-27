<div class="relative overflow-x-auto sm:rounded-lg">
    <div class="flex items-center justify-between pb-4 pt-2">
        <div>
            <button type="button" wire:click="$emit('openModal', 'admin.programing-lang.add-language')" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>
        </div>
        <div class="flex gap-3">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" wire:model="search" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
            </div>
            <x-select placeholder="10" name="perpage" class="w-20" :options="['10', '50', '100', '500']" wire:model="perpage"/>
        </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 w-32  text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($programingLangs as $lang)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $lang->name  }}
                </td>
                <td class="px-6 py-4 w-32 text-center">
                    <div class="flex gap-3">
                        <a href="javascript:;" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <a href="javascript:;" wire:click="delete({{ $lang->id }})" class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="py-6">
        {{ $programingLangs->links() }}
    </div>
  </div>