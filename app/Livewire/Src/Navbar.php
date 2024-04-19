<?php

namespace App\Livewire\Src;

use App\Livewire\Forms\UserForm;
use Livewire\Component;

class Navbar extends Component
{
    public $menu1 = array(
        array('name' => "Clients", "route" => "clients", "icon" => "users"),
    );

    public function render()
    {
        return view('livewire.src.navbar', [
            "menus" => $this->menu1,
            'user' => auth()->user(),
        ]);
    }

    // Register
    public UserForm $user_form;
    public $formtype = true;

    function register()
    {
        $this->user_form->store();

        $this->dispatch('close-register');
    }

    public $email;
    public $password;
    public $errorMessage;

    function login()
    {
        $this->validate([
            'email' => 'required|email|exists:App\Models\User,email',
            'password' => 'required'
        ]);

        $login = $this->user_form->login($this->email, $this->password);
        if ($login) {
            $this->reset('email', 'password', 'errorMessage');
            $this->dispatch('close-login');
            return redirect()->intended('/');
        } else {
            $this->errorMessage = 'Les identifiants sont incorrects';
        }
    }

    function logout()
    {
        $this->user_form->logout();
    }
}
