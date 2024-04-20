<?php

namespace App\Livewire;

use App\Models\Tache;
use Livewire\Component;

class TaskPage extends Component
{
    public $tache;

    function mount($tache_id){
        $this->tache = Tache::find($tache_id);
    }

    public function render()
    {
        $breadcrumbs = array(
            array("name" => "Clients", "route" => route("clients")),
            array("name" => $this->tache->projet->client->name, "route" => route("client", ['client_id' => $this->tache->projet->client->id])),
            array("name" => $this->tache->projet->name, "route" => route("projet", ['projet_id' => $this->tache->projet->id])),
            array("name" => "Tache", "route" => route("tache", ['tache_id' => $this->tache->id])),
        );
        return view('livewire.task-page',[
            'breadcrumbs' => $breadcrumbs,

        ]);
    }
}
