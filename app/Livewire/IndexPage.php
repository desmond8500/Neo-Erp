<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class IndexPage extends Component
{
    use WithFileUploads;

    public function render()
    {
        return view('livewire.index-page');
    }
}
