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
        return view('livewire.admin.programing-lang', [
            'programingLangs' => ProgramLanguage::orderBy('id', 'desc')->paginate($this->perpage),
        ]);
    }
}
