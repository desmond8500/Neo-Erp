<?php

namespace App\Livewire;

use App\Livewire\Forms\ClientForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class ClientAdd extends Component
{
    use WithFileUploads;
    public ClientForm $clientForm;

    public function render()
    {
        return view('livewire.client-add');
    }

    function store()
    {
        $this->clientForm->store();
        $this->dispatch('close-addClient');
    }
}
