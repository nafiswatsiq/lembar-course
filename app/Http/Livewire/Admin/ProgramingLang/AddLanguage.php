<?php

namespace App\Http\Livewire\Admin\ProgramingLang;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\ProgramLanguage;
use LivewireUI\Modal\ModalComponent;

class AddLanguage extends ModalComponent
{
    use Actions;
    
    public $name;

    public function add()
    {
        $this->validate([
            'name' => 'required'
        ]);

        ProgramLanguage::create([
            'name' => $this->name
        ]);

        $this->notification()->success(
            $title = 'Berhasil',
            $description = 'Berhasil Menambahkan '.$this->name
        );

        $this->emit('refresh');
        $this->close();
    }

    public function close()
    {
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.admin.programing-lang.add-language');
    }
}
