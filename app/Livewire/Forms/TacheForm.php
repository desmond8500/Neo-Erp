<?php

namespace App\Livewire\Forms;

use App\Models\Tache;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TacheForm extends Form
{
    public Tache $tache;

    #[Rule('required')]
    public $projet_id;
    #[Rule('required')]
    public $priorite_id = 1;
    #[Rule('required')]
    public $progression_id = 1;
    #[Rule('required')]
    public $titre;
    public $description;
    public $debut;
    public $fin;
    public $statut;
    public $echeance;

    function store(){
        $this->validate();
        Tache::create($this->all());
    }

    function set($model_id){
        $this->tache = Tache::find($model_id);

        $this->projet_id = $this->tache->projet_id;
        $this->priorite_id = $this->tache->priorite_id;
        $this->progression_id = $this->tache->progression_id;
        $this->titre = $this->tache->titre;
        $this->description = $this->tache->description;
        $this->debut = $this->tache->debut;
        $this->fin = $this->tache->fin;
        $this->statut = $this->tache->statut;
        $this->echeance = $this->tache->echeance;
    }

    function update(){
        $this->tache->update($this->all());
    }

    function delete(){
        $this->tache->delete();
    }
}
