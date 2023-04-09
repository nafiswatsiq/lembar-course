<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public $pageName;

    public function mount(){
        if(request()->route()->getName() == 'admin.dashboard'){
            $this->pageName = 'Dashboard';
        }else if(request()->route()->getName() == 'admin.class'){
            $this->pageName = 'Kelas';
        }else if(request()->route()->getName() == 'admin.class.section'){
            $this->pageName = 'Buat Modul';
        }

    }
    public function logout()
    {
       Auth::logout();

       return redirect('/');
    }
    
    public function render()
    {
        return view('livewire.admin.navbar');
    }
}
