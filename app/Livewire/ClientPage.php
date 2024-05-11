<?php

namespace App\Livewire;

use App\Livewire\Forms\ClientForm;
use App\Livewire\Forms\ProjetForm;
use App\Models\Client;
use App\Models\Projet;
use App\Models\Tache;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class ClientPage extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $client;
    public $client_id;
    public ClientForm $clientForm;
    public ProjetForm $projetForm;

    public function mount($client_id){
        $this->client = Client::find($client_id);
        $this->client_id = $client_id;
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
            'projets' => Projet::where('client_id', $this->client->id)->paginate(15),
        ]);
    }

    // Client
    public $message_type = 'primary';

    function edit($client_id)
    {
        $this->clientForm->set($client_id);
        $this->dispatch('open-editClient');
    }

    function update()
    {
        $this->clientForm->update($this->selected);
        $this->client = Client::find($this->client_id);
        $this->dispatch('close-editClient');
        $this->render();
    }

    function delete($client_id)
    {
        $this->clientForm->set($client_id);
        $client = Client::find($client_id);

        if ($client->projets->count()) {
            $this->message = 'Ce client a des projets, il faut les supprimer avant de supprimer ce dernier';
            $this->message_type = 'danger';
            $this->dispatch('open-infoModal');
        } else {
            $this->clientForm->delete();
            $this->dispatch('close-editClient');
            $this->dispatch('get-clients');
        }
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

    function projet_delete($projet_id)
    {
        $projet = Projet::find($projet_id);
        $this->projetForm->set($projet_id);

        if ($projet->taches->count()) {
            $this->message = 'Ce projet a des taches, il faut les supprimer avant de supprimer ce dernier';
            $this->message_type = 'danger';
            $this->dispatch('open-infoModal');
        } else {
            $this->projetForm->delete();
            $this->dispatch('close-editClient');
            $this->dispatch('get-clients');
        }
     }

    function projet_toggleFavorite()
    {
        $this->projetForm->favorite();
    }
}
