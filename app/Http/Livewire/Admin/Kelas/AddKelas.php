<?php

namespace App\Http\Livewire\Admin\Kelas;

use App\Models\Kelas;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class AddKelas extends ModalComponent
{
    use WithFileUploads;
    
    public $name;
    public $description;
    public $image;

    public function create()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $this->image->store('images', 'public');

        Kelas::create([
            'slug' => Str::slug($this->name),
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image->hashName(),
        ]);

        $this->close();

        $this->emit('refresh');
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }

    public function close()
    {
        $this->closeModal();
    }


    public function render()
    {
        return view('livewire.admin.kelas.add-kelas');
    }
}
