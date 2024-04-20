<?php

namespace App\Livewire\Forms;

use App\Http\Controllers\MainController;
use App\Models\Client;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ClientForm extends Form
{
    public Client $client;

    #[Rule('required')]
    public $name;
    public $description;
    public $statut;
    public $logo;
    public $type = false;
    public $adresse;

    function fix()
    {
        $this->name = ucfirst($this->name);
        $this->description = ucfirst($this->description);
    }

    function store(){
        $this->fix();
        $client = Client::create($this->all());

        if ($this->logo) {
            $client->logo = MainController::storeImage("clients/$client->id/logo", $this->logo);
            $client->save();
        }
        $this->reset('name', 'description', 'adresse');
    }

    function set($model_id){
        $this->client = Client::find($model_id);

        $this->name = $this->client->name;
        $this->description = $this->client->description;
        $this->statut = $this->client->statut;
        $this->logo = $this->client->logo;
        $this->type = $this->client->type;
        $this->adresse = $this->client->adresse;
    }

    function update(){
        // if ($this->logo) {
        // // if ($this->logo != $this->client->logo) {
        //     $this->client->logo = MainController::storeImage("clients/". $this->client->id."/logo", $this->logo, true);
        //     $this->client->save();
        // }

        $this->fix();

        $this->client->update($this->all());
    }

    function delete(){
        $this->client->delete();
    }
}
