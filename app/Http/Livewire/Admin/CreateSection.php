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


    protected $listeners = [
        'refresh' => 'mount',
        'reloadSection' => 'section',
    ];

    public function mount()
    {
        $kelas = Kelas::where('slug', $this->slug)->first();
        $this->sections = $kelas->sections;

        try{
            $this->section = Section::where('id', $this->section_id)->first();
            $this->section_id = $this->section->id;

        }catch(\Exception $e){
            if($this->sections->count() > 0){
                $this->section = $this->sections->first();
                $this->section_id = $this->section->id;
    
                $this->section($this->section->id);
            }
        }
    }

    public function section($id)
    {
        $this->section_id = $id;

        $this->emit('section', $this->section_id);
    }

    public function render()
    {
        return view('livewire.admin.create-section');
    }
}
