<?php

namespace App\Livewire\Settings;

use App\Livewire\Forms\UserForm;
use Livewire\Component;

class Compte extends Component
{
    public $edit = true;
    public $user;
    public UserForm $user_form;

    function mount(){
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.settings.compte');
    }

    function edit_user(){
        $this->user_form->set();
        $this->edit = false;
    }

    function update_user(){
        $this->user_form->update();
        $this->edit = true;

        $this->user = auth()->user();
    }
}
