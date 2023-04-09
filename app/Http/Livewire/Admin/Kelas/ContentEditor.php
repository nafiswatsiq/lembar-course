<?php

namespace App\Http\Livewire\Admin\Kelas;

use App\Models\Section;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Http\Request;

class ContentEditor extends Component
{
    use Actions;
    
    public $sections;

    public $section;

    public $content;

    public $title;

    protected $listeners = [
        'section' => 'section',
    ];

    public function mount()
    {
        if($this->sections->count() > 0) {
            $this->section = $this->sections->first();
            $this->title = $this->section->title;
            $this->content = $this->section->content;
        }
    }

    public function section($id)
    {
        $this->section = Section::where('id', $id)->first();
        $this->title = $this->section->title;
        $this->content = $this->section->content;
    }

    public function save()
    {
        $this->section->update([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->notification()->success(
            $title = 'Disimpan',
            $description = 'Berhasil menyimpan'
        );

        $this->emit('refresh');
    }

    public function delete()
    {
        $this->section->delete();

        $this->notification()->success(
            $title = 'Dihapus',
            $description = 'Berhasil menghapus'
        );

        // $this->emit('refresh');
        return redirect()->route('admin.class.section', $this->section->kelas->slug);
    }
    public function render()
    {
        return view('livewire.admin.kelas.content-editor');
    }
}
