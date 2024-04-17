<?php

namespace App\Livewire;

use App\Livewire\Forms\ProjetForm;
use Livewire\Component;

class ProjetAdd extends Component
{
    public ProjetForm $projetForm;

    public function mount($client_id){
        $this->projetForm->client_id = $client_id;
    }
    public function render()
    {
        return view('livewire.projet-add');
    }

    function store()
    {
        $this->projetForm->store();
        $this->dispatch('close-addProjet');
        $this->dispatch('get-projets');
        $this->reset('projetForm.name', 'projetForm.description');
    }
}
