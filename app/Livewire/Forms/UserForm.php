<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public User $user;
    #[Rule('required')]
    public $prenom;
    #[Rule('required')]
    public $nom;
    #[Rule('required|email|unique:App\Models\User,email')]
    public $email;
    #[Rule('required')]
    public $password;
    #[Rule('required')]
    public $fonction;
    #[Rule('required|same:password')]
    public $password_confirmation;

    function set(){
        $this->user = auth()->user();

        $this->prenom = $this->user->prenom;
        $this->nom = $this->user->nom;
        $this->email = $this->user->email;
        $this->fonction = $this->user->fonction;
    }

    function fix(){
        $this->prenom = ucfirst($this->prenom);
        $this->nom = ucfirst($this->nom);
        $this->fonction = ucfirst($this->fonction);
    }

    function store()
    {
        $this->prenom = ucfirst($this->prenom);
        $this->nom = ucfirst($this->nom);
        User::create($this->all());
    }

    function update()
    {
        // $this->validate();
        $this->user->update([
            'prenom' => $this->prenom,
            'nom' => $this->nom,
            'email' => $this->email,
        ]);
    }

    function login($email, $password)
    {
        $credentials = array(
            'email' => $email,
            'password' => $password,
        );

        if (Auth::attempt($credentials)) {
            return true;
        } else {
            return false;
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect()->intended('/');
    }

    function updateAvatar($avatar)
    {
        $user = auth()->user();

        $dir = "user/$user->id/avatar";
        Storage::disk('public')->deleteDirectory($dir);
        $name = $avatar->getClientOriginalName();
        $avatar->storeAs("public/$dir", $name);

        $user->avatar = "storage/$dir/$name";
        $user->save();
    }

}
