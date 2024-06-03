<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 

class Header extends Component
{
    public function logout(){
        session()->flush();
        
    }
    public function render()
    {
        return view('livewire.header');
    }

    #[On('refreshToken')] 
    public function refreshPost()
    {
        // ...
    }
}
