<?php

namespace App\Http\Livewire\Admin;

use App\Models\Kelas;
use App\Models\Section;
use Livewire\Component;

class CreateSection extends Component
{
    public $sections;

    public $slug;

    public $section;

    public $section_id;

    public $idSection;

    public $className;


    protected $listeners = [
        'refresh' => 'mount',
        'reloadSection' => 'section',
    ];

    public function mount()
    {
        $kelas = Kelas::where('slug', $this->slug)->first();
        $this->sections = $kelas->sections;
        $this->className = $kelas->name;

        if($this->idSection){
            $this->section_id = $this->idSection;
        }else{
            if($this->sections->count() > 0){
                $this->section = $this->sections->first();
                $this->section_id = $this->section->id;
            }
        }
    }

    public function delete()
    {
        $kelas = Kelas::where('slug', $this->slug)->first();
        $kelas->delete();

        return redirect()->route('admin.class');
    }

    public function render()
    {
        return view('livewire.admin.create-section');
    }
}
