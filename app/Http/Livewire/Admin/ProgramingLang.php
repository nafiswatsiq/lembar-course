<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Models\ProgramLanguage;

class ProgramingLang extends Component
{
    use Actions;
    use WithPagination;

    public $perpage = 10;

    public $search;
    
    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function delete($id)
    {
        $programingLang = ProgramLanguage::find($id);
        $programingLang->delete();

        $this->notification()->success(
            $title = 'Dihapus',
            $description = 'Berhasil Dihapus'
        );

        $this->emit('refresh');
    }

    public function render()
    {
        $programingLang = ProgramLanguage::where('name', 'like', '%'.$this->search.'%')->paginate($this->perpage);
        return view('livewire.admin.programing-lang', [
            'programingLangs' => $programingLang,
        ]);
    }
}
