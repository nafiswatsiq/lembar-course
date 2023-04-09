<?php

namespace App\Http\Livewire\Admin\Kelas;

use App\Models\Kelas;
use App\Models\Section;
use Livewire\Component;
use Illuminate\Support\Str;
use LivewireUI\Modal\ModalComponent;

class AddSection extends ModalComponent
{
    public $title;

    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function submit()
    {
        $kelas = Kelas::where('slug', $this->slug)->first();

        $this->validate([
            'title' => 'required',
        ]);

        Section::create([
            'kelas_id' => $kelas->id,
            'slug' => Str::slug($this->title),
            'title' => $this->title,
        ]);

        $this->close();

        $this->emit('refresh');
    }

    public function close()
    {
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.admin.kelas.add-section');
    }
}
