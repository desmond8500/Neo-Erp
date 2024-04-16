<?php

namespace App\Livewire;

use App\Livewire\Forms\ClientForm;
use App\Models\Client;
use Livewire\Component;

class ClientsPage extends Component
{
    public $breadcrumbs = array(
        array("name" => "Clients", "route" => "clients"),
    );
    public $search;
    public ClientForm $clientForm;

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

    public $selected;

    function edit($client_id)
    {
        $this->selected = Client::find($client_id);;
        $this->clientForm->set($client_id);
        $this->dispatch('open-editClient');
    }

    function update()
    {
        $this->clientForm->update($this->selected);
        $this->dispatch('close-editClient');
        $this->render();
    }
    function delete()
    {
        $client = Client::find($this->selected->id);

        if ($client->projets->count()) {
            // $this->error_message = 'Ce client a des projets, il faut les supprimer avant';
        } else {
            $this->selected->delete();
            $this->dispatch('close-editClient');
        }
    }
}
