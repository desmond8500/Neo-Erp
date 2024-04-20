<?php

namespace App\Livewire;

use Livewire\Component;

class ProfilePage extends Component
{
    public $user;
    public $tabs;
    public $selected_tab = 0;

    function mount(){
        $this->user =  auth()->user();

        $this->tabs = (object) array(
            (object) array('id'=> 0, 'name'=> 'Mon compte'),
        );
    }

    public function render()
    {
        $breadcrumbs = array(
            array("name" => "Profile", "route" => route("profile",['user_id'=> $this->user->id])),
        );
        return view('livewire.profile-page',[
            'breadcrumbs' => $breadcrumbs
        ]);
    }
}
