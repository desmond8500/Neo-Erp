<?php

namespace App\Livewire;

use App\Livewire\Forms\ClientForm;
use App\Models\Client;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class ClientsPage extends Component
{
    use WithFileUploads;
    public $breadcrumbs = array(
        array("name" => "Clients", "route" => "clients"),
    );
    public $search;
    public $message;
    public $message_type = 'primary';
    public ClientForm $clientForm;
    public $avatar;

    #[On('get-clients')]
    public function render()
    {
        return view('livewire.clients-page',[
            "breadcrumbs" => $this->breadcrumbs,
            'clients' => Client::search($this->search)->paginate(10),
        ]);
    }

    function gotoProjets($client_id)
    {
        return redirect()->route('projets', ['client_id' => $client_id]);
    }

    function edit($client_id)
    {
        $this->clientForm->set($client_id);
        $this->dispatch('open-editClient');
    }

    function update()
    {
        $this->clientForm->logo = $this->avatar;
        $this->clientForm->update();
        $this->dispatch('close-editClient');
        $this->render();
    }

    function delete($client_id)
    {
        // $this->message = "$client_id";
        // $this->dispatch('open-infoModal');

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
}
