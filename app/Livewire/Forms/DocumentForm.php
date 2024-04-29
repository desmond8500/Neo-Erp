<?php

namespace App\Livewire\Forms;

use App\Models\Document;
use App\Models\Livrable;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DocumentForm extends Form
{
    public Document $document;

    #[Rule('required')]
    public $tache_id;
    #[Rule('required')]
    public $name;
    public $link;
    public $folder;

    function fix(){
        $this->name = ucfirst($this->name);
    }

    function store(){
        $this->validate();
        Document::create($this->all());
    }

    function set($document_id){
        $this->document = Document::find($document_id);

        $this->tache_id = $this->document->tache_id;
        $this->name = $this->document->name;
        $this->link = $this->document->link;
        $this->folder = $this->document->folder;
    }

    function update(){
        // $this->validate();
        $this->document->update($this->all());
    }

    function delete(){
        $this->document->delete();
    }
}
