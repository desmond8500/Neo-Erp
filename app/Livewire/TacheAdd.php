<?php

namespace App\Livewire;

use App\Http\Controllers\MainController;
use App\Livewire\Forms\TacheForm;
use App\Models\Priorite;
use App\Models\Progression;
use App\Models\Projet;
use Livewire\Component;

class TacheAdd extends Component
{
    public TacheForm $tache;

    public $projet;

    public function mount($projet_id){
        $this->projet = Projet::find($projet_id);

    }

    public function render()
    {
        return view('livewire.tache-add',[
            'priorites' => Priorite::all(),
            'progressions' => Progression::all(),
        ]);
    }

    function store()
    {
        $this->tache->projet_id = $this->projet->id;

        $this->tache->store();
        $this->dispatch('close-addTask');
        $this->dispatch('get-tasks');
    }
}
