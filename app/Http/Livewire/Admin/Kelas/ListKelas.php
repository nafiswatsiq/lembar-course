<?php

namespace App\Http\Livewire\Admin\Kelas;

use App\Models\Kelas;
use Livewire\Component;

class ListKelas extends Component
{
    public $kelas;

    protected $listeners = [
        'refresh' => 'mount',
    ];

    public function mount()
    {
        $this->kelas = Kelas::all();
    }

    public function render()
    {
        return view('livewire.admin.kelas.list-kelas');
    }
}
