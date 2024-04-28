<?php

namespace App\Livewire;

use App\Livewire\Forms\DocumentForm;
use Livewire\Component;

class DocumentAdd extends Component
{

    public function render()
    {
        return view('livewire.document-add');
    }

    public $tache_id;

    function mount($tache_id){
        $this->tache_id = $tache_id;
    }
    public DocumentForm $document_form;

    function store(){
        $this->document_form->tache_id = $this->tache_id;
        $this->document_form->store();
        $this->dispatch('close-addDocument');
        $this->dispatch('get-documents');
    }
}
