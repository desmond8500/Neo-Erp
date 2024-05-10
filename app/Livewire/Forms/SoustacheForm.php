<?php

namespace App\Livewire\Forms;

use App\Models\Soustache;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SoustacheForm extends Form
{
    public Soustache $soustache;

    #[Rule('required')]
    public $tache_id;
    public $name;
    public $status_id;
    public $description;

    function fix(){
        $this->name = ucfirst($this->name);
    }

    function store(){
        // $this->validate();
        $this->fix();
        Soustache::create($this->all());
    }

    function set($model_id){
        $this->soustache = Soustache::find($model_id);
        $this->name = $this->soustache->name;
        $this->status_id = $this->soustache->status_id;
        $this->description = $this->soustache->description;
    }

    function update(){
        $this->validate();
        $this->fix();
        $this->soustache->update($this->all());
    }

    function delete(){
        $this->soustache->delete();
    }
}
