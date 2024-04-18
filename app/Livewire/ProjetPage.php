<?php

namespace App\Livewire;

use App\Livewire\Forms\ProjetForm;
use App\Models\Projet;
use Livewire\Component;

class ProjetPage extends Component
{
    public $projet;
    public ProjetForm $projetForm;

    public function mount($projet_id)
    {
        $this->projet = Projet::find($projet_id);
    }

    public function render()
    {
        $breadcrumbs = array(
            array("name" => "Clients", "route" => route("clients")),
            array("name" => $this->projet->client->name, "route" => route("client", ['client_id' => $this->projet->client->id])),
            array("name" => $this->projet->name, "route" => route("projet", ['projet_id' => $this->projet->id])),
        );
        return view('livewire.projet-page',[
            'breadcrumbs' => $breadcrumbs,
        ]);
    }
}
