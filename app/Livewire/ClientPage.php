<?php

namespace App\Livewire;

use App\Livewire\Forms\ClientForm;
use App\Livewire\Forms\ProjetForm;
use App\Models\Client;
use App\Models\Projet;
use App\Models\Tache;
use Livewire\Attributes\On;
use Livewire\Component;

class ClientPage extends Component
{
    public $client;
    public ClientForm $clientForm;
    public ProjetForm $projetForm;

    public function mount($client_id){
        $this->client = Client::find($client_id);
    }

    #[On('get-projets')]
    public function render()
    {
        $breadcrumbs = array(
            array("name" => "Clients", "route" => route("clients")),
            array("name" => $this->client->name, "route" => route("client", ['client_id' => $this->client->id])),
        );
        return view('livewire.client-page',[
            'breadcrumbs' => $breadcrumbs,
            'projets' => Projet::where('client_id', $this->client->id)->paginate(8),
        ]);
    }

    // Client

    function edit($client_id)
    {
        $this->clientForm->set($client_id);
        $this->dispatch('open-editClient');
    }

    function update()
    {
        $this->clientForm->update($this->selected);
        $this->dispatch('close-editClient');
        $this->render();
    }

    // Projet
    public $selected , $taches, $message;

    public function select_project($projet_id){
        $this->selected = $projet_id;
        // $this->selected = Projet::find($projet_id);
        $this->taches = Tache::where('projet_id', $projet_id)->get();
    }

    function projet_edit($projet_id)
    {
        $this->projetForm->set($projet_id);
        $this->dispatch('open-editProjet');
    }

    function projet_update()
    {
        $this->projetForm->update();
        $this->dispatch('close-editProjet');
    }

    function projet_delete()
    {
        $projet = Projet::find($this->selected);

        // if ($projet->taches()->count()) {
        //     $this->message = 'Ce client a des projets, il faut les supprimer avant';
        //     $this->dispatch('open-infoModal');
        // } else {
            $this->projetForm->delete();
            $this->dispatch('close-editProjet');
            $this->dispatch('get-clients');
        // }


    }

    function projet_toggleFavorite()
    {
        $this->projetForm->favorite();
    }
}
