<div>
  <div class="bg-white shadow-xl py-3 px-5 rounded-lg mb-5">
    <div class="flex gap-4 items-center">
      <div class="mb-6 flex-grow">
        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kelas</label>
        <input type="text" wire:model="className" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      </div>
      <div class="h-fit">
        <button type="button" class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500">
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          <span class="sr-only">Edit</span>
        </button>
        <button wire:click="delete" type="button" class="text-red-500 border border-red-500 hover:bg-red-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800 dark:hover:bg-red-500">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5" fill="currentColor" id="trash-alt"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"></path></svg>
          <span class="sr-only">Hapus</span>
        </button>
      </div>
    </div>
  </div>
  <div class="flex">
      <div class="w-3/12">
        <button wire:click="$emit('openModal', 'admin.kelas.add-section', {{ json_encode([$slug]) }})" type="button" class="w-full py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
          <div class="flex justify-center">
            Tambah Section
            <svg class="fill-slate-800 w-4 ms-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="plus"><path fill="" d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z"></path></svg>  
          </div>
        </button>
        
        <div class="mt-5 grid grid-rows-1 gap-3">
          @foreach ($sections as $section )
          <a href="{{ route('admin.class.section.create', ['slug'=> $slug, 'id'=>$section->id]) }}" class="w-full border rounded-lg px-4 py-2 shadow-md hover:shadow-none cursor-pointer  @if ($section->id == $section_id) section-active @else bg-white @endif">
            <p>{{ Str::limit($section->title, 75, false) }}</p>
          </a>
          @endforeach
        </div>
      </div>
      <div class="w-9/12 px-6">
        @if ($sections->count() > 0)
        <div class="w-full bg-white shadow-lg p-10 rounded-xl">
          <livewire:admin.kelas.content-editor :sections="$sections" :idSection="$idSection"/>
        </div>
        @endif
      </div>
  </div>
</div>