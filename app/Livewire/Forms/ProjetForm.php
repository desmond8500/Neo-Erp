<?php

namespace App\Livewire\Forms;

use App\Models\Projet;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProjetForm extends Form
{
    public Projet $projet;

    #[Rule('required')]
    public $name;
    #[Rule('required')]
    public $client_id;
    public $description;
    public $start_date;
    public $end_date;
    public $favorite = 0;

    function fix(){
        $this->name = ucfirst($this->name);
        $this->description = ucfirst($this->description);
    }

    function set($projet_id)
    {
        $this->projet = Projet::find($projet_id);

        $this->client_id = $this->projet->client_id;
        $this->name = $this->projet->name;
        $this->description = $this->projet->description;
        $this->start_date = $this->projet->start_date;
        $this->end_date = $this->projet->end_date;
        $this->favorite = $this->projet->favorite;
    }

    function store()
    {
        $this->validate();
        $this->fix();
        Projet::create($this->all());
        $this->reset('name', 'description','start_date', 'end_date');
    }

    function update()
    {
        $this->fix();
        $this->projet->update($this->all());
        $this->reset('name', 'description', 'start_date', 'end_date');
    }

    function delete()
    {
        $this->projet->delete();
    }

    function favorite()
    {
        if ($this->favorite) {
            $this->favorite = 0;
        } else {
            $this->favorite = 1;
        }
        $this->projet->update($this->only('favorite'));
    }
}
