<?php

namespace App\Livewire;

use App\Livewire\Forms\DocumentForm;
use App\Livewire\Forms\SoustacheForm;
use App\Livewire\Forms\TacheForm;
use App\Models\Document;
use App\Models\Priorite;
use App\Models\Progression;
use App\Models\Soustache;
use App\Models\Tache;
use Livewire\Attributes\On;
use Livewire\Component;

class TaskPage extends Component
{
    public $tache;
    public TacheForm $tache_form;

    function mount($tache_id){
        $this->tache = Tache::find($tache_id);
    }

    public function render()
    {
        $breadcrumbs = array(
            array("name" => "Clients", "route" => route("clients")),
            array("name" => $this->tache->projet->client->name, "route" => route("client", ['client_id' => $this->tache->projet->client->id])),
            array("name" => $this->tache->projet->name, "route" => route("projet", ['projet_id' => $this->tache->projet->id])),
            array("name" => "Tache", "route" => route("tache", ['tache_id' => $this->tache->id])),
        );

        return view('livewire.task-page',[
            'breadcrumbs' => $breadcrumbs,
            'priorites' => Priorite::all(),
            'progressions' => Progression::all(),
            'documents' => $this->getDocuments(),
            'soustaches' => $this->get_soustache(),

        ]);
    }

    // Tache
    function edit_tache($tache_id)
    {
        $this->tache_form->set($tache_id);
        $this->dispatch('open-editTache');
    }

    function update_tache()
    {
        $this->tache_form->update();
        $this->tache = Tache::find($this->tache->id);
        $this->dispatch('close-editTache');
    }

    function delete_tache()
    {
        $this->tache_form->delete();
        $this->dispatch('close-editTache');
    }

    // liens

    public DocumentForm $document_form;

    #[On('get-documents')]
    function getDocuments(){
        return Document::where('tache_id', $this->tache->id)->get();
    }

    function edit_link($id){
        $this->document_form->set($id);
        $this->dispatch('open-editLink');
    }

    function update_link(){
        $this->document_form->update();
        $this->dispatch('close-editLink');
    }

    function delete_link(){
        $this->document_form->delete();
    }
    // Sous tache

    public $soustache;
    public SoustacheForm $soustache_form;

    function get_soustache(){
        $this->soustache_form->tache_id = $this->tache->id;
        $this->soustache_form->status_id = 1;
        return Soustache::where('tache_id', $this->tache->id)->get();
    }

    function add_soustache(){
        $this->dispatch('open-addSubTask');
    }

    function store_soustache(){
        $this->soustache_form->store();
        $this->dispatch('close-addSubTask');
    }

    function edit_soustache($id){
        $this->soustache_form->set($id);
        $this->dispatch('open-editSubTask');
    }

    function update_soustache(){
        $this->soustache_form->update();
        $this->dispatch('close-editSubTask');
    }

    function delete_soustache($id){
        $this->soustache_form->set($id);
        $this->soustache_form->delete();
    }
}
