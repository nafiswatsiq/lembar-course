<?php

namespace App\Http\Livewire\Admin\ProgramingLang;

use Livewire\Component;
use App\Models\ProgramLanguage;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class EditLanguage extends ModalComponent
{
    use Actions;

    public $name;

    public $programingLangId;

    public function mount($id)
    {
        $this->programingLangId = $id;
        $programingLang = ProgramLanguage::find($id);
        $this->name = $programingLang->name;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required'
        ]);

        $programingLang = ProgramLanguage::find($this->programingLangId);
        $programingLang->update([
            'name' => $this->name
        ]);

        $this->notification()->success(
            $title = 'Berhasil',
            $description = 'Berhasil Mengubah '.$this->name
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
        return view('livewire.admin.programing-lang.edit-language');
    }
}
