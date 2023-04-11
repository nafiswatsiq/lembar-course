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