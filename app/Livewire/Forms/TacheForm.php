<?php

namespace App\Livewire\Forms;

use App\Models\Livrable;
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

    public $livrables;

    function fix(){
        $this->titre = ucfirst($this->titre);
        $this->description = ucfirst($this->description);
    }

    function store(){
        $this->validate();
        $this->fix();
        $tache = Tache::create($this->all());
        $this->reset('titre', 'description', 'debut', 'fin', 'echeance', 'statut');

        if ($this->livrables) {
            foreach ($this->livrables as $key => $livrable) {
                Livrable::create([
                    'tache_id' => $tache->id,
                    'nom' => $livrable,
                ]);
            }
        }
    }

    function set($tache_id){
        $this->tache = Tache::find($tache_id);

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
        $this->validate();
        $this->fix();
        $this->tache->update($this->all());
    }

    function delete(){
        $this->tache->delete();
    }
}
