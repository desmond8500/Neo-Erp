<?php

namespace App\Livewire;

use App\Livewire\Forms\TacheForm;
use App\Models\Priorite;
use App\Models\Progression;
use App\Models\Projet;
use App\Models\Tache;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ResumeCard extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public $projet_id;
    public TacheForm $tache_form;

    public function mount($projet_id = null)
    {
        $this->projet_id = $projet_id;
    }

    #[On('get-tasks')]
    public function render()
    {
        if ($this->projet_id) {
            $taches = Tache::where('projet_id', $this->projet_id)->paginate(6);
        } else {
            $taches = Tache::orderBy('projet_id')->paginate(6);
        }
        return view('livewire.resume-card',[
            'taches' => $taches,
            'projet' => Projet::find($this->projet_id),
            'priorites' => Priorite::all(),
            'progressions' => Progression::all(),
            'carbon' => Carbon::now()->locale('fr_FR'),
        ]);
    }

    function edit($tache_id)
    {
        $this->tache_form->set($tache_id);
        $this->dispatch('open-editTache');
    }

    function update()
    {
        $this->tache_form->update();
        $this->dispatch('close-editTache');
    }

    function delete()
    {
        $this->tache_form->delete();
        $this->dispatch('close-editTache');
    }

    function details($tache_id)
    {
        $this->tache_form->delete();
        $this->dispatch('close-editTache');
    }
}
