<div>
    <div class="grid grid-cols-5 gap-6">
        <a href="javascript:;" class="border shadow-lg rounded-xl p-8 cursor-pointer flex justify-center items-center" wire:click="$emit('openModal', 'admin.kelas.add-kelas')">
          <div class="w-32">
            <svg class="fill-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="plus"><path fill="" d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z"></path></svg>
            <p class="font-medium text-slate-500 text-center">Tambah Kelas</p>
          </div>
        </a>
        @foreach ($kelas as $kls)
        <div class="border shadow-lg rounded-xl px-6 py-3">
          <a href="{{ route('admin.class.section', $kls->slug) }}" class="w-full h-full">
            <div>
              <img src="{{ asset('storage/images/'.$kls->image) }}" alt="">
            </div>
            <p class="font-medium text-slate-500 text-center text-lg">{{ $kls->name }}</p>
          </a>
        </div>
        @endforeach
    </div>
</div>