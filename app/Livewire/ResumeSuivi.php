<?php

namespace App\Livewire;

use App\Models\Projet;
use App\Models\Tache;
use Livewire\Attributes\On;
use Livewire\Component;

class ResumeSuivi extends Component
{
    public $projet, $taches;

    public function mount($projet_id, $taches){
        $this->projet = Projet::find($projet_id);
    }

    #[On('get-tasks')]
    public function render()
    {
        return view('livewire.resume-suivi',[
            'taches' => $this->taches,
        ]);
    }
}
