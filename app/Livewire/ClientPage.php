<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;

class ClientPage extends Component
{
    public $client;
    public function mount($client_id){
        $this->client = Client::find($client_id);
    }

    public function render()
    {

        $breadcrumbs = array(
            array("name" => "Clients", "route" => route("clients")),
            array("name" => "Client", "route" => route("client", ['client_id' => $this->client_id])),
        );
        return view('livewire.client-page',[

        ]);
    }
}
