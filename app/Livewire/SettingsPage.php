<?php

namespace App\Livewire;

use App\Models\Progression;
use Livewire\Component;

class SettingsPage extends Component
{

    public function render()
    {
        $breadcrumbs = array(
            array("name" => "Réglages", "route" => route("settings",['user_id'=>auth()->user()->id])),
        );
        return view('livewire.settings-page',[
            'breadcrumbs' => $breadcrumbs,
            'progressions' => Progression::all(),
            'user' => auth()->user()
        ]);
    }

    // Progression
    public $progress_name, $progress_color = 'blue', $progress;

    function progress_store() {
        Progression::create([
            'name'=> ucfirst($this->progress_name),
            'color'=> $this->progress_color,
        ]);
        $this->dispatch('close-addProgress');
    }
    function progress_edit($progress_id) {
        $this->progress = Progression::find($progress_id);
        $this->progress_name = $this->progress->name;
        $this->progress_color = $this->progress->color;
        $this->dispatch('open-editProgress');
    }
    function progress_update() {
        $this->progress->name = ucfirst($this->progress_name);
        $this->progress->color = $this->progress_color;
        $this->progress->save();
        $this->dispatch('close-editProgress');
        // $this->render();
    }
    function progress_delete($progress_id) {
        $this->progress = Progression::find($progress_id);
        $this->progress->delete();
    }
}
