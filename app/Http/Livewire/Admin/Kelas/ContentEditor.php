<?php

namespace App\Http\Livewire\Admin\Kelas;

use App\Models\Section;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ContentEditor extends Component
{
    use Actions;
    use WithFileUploads;
    
    public $sections;

    public $section;

    public $content;

    public $image;

    public $title;

    public $idSection;

    protected $listeners = [
        'section' => 'section',
    ];

    public function mount()
    {
        if($this->sections->count() > 0) {
            if($this->idSection){
                $this->section = $this->sections->where('id', $this->idSection)->first();
            }else{
                $this->section = $this->sections->first();
            }
            $this->title = $this->section->title;
            $this->content = $this->section->content;
        }
    }

    public function save()
    {
        $description = $this->content;
        $dom = new \DomDocument();
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');
        
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            $check_img = str_replace('/storage/images/content/', '', $data);
            if (Storage::exists('public/images/content/'.$check_img)) {
                // gambar ada di storage
                // dd('ada');
            } else {
                // gambar tidak ada di storage
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);
                $image_name = "/storage/images/content/".time().$k.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
         }

        $content = $dom->saveHTML();

        $this->section->update([
            'title' => $this->title,
            'content' => $content,
        ]);

        $this->notification()->success(
            $title = 'Disimpan',
            $description = 'Berhasil menyimpan'
        );

        $this->emit('refresh');
    }

    // public function storeImg()
    // {
    //     $path = $this->image->store('public/images');

    //     return Storage::url($path);
    // }

    // public function updatedContent()
    // {
    //     $this->emit('contentUpdated', $this->content);
    // }

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
