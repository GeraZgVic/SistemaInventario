<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

class ModalAgregarUser extends Component
{
    #[Validate('required')]
    public $name;
    #[Validate('required|email|unique:users,email')]
    public $email;
    #[Validate('required')]
    public $password;
    #[Validate('required|same:password')]
    public $password_confirm;


    public function save() {

        $datos = $this->validate();

        User::create([
            'name' => $datos['name'],
            'email' => $datos['email'],
            'password' => Hash::make($datos['password'])
        ]);

        return redirect()->route('users.index')->with('alert-success', 'Se Agregó Correctamente');
    }

    public function render()
    {
        return view('livewire.modal-agregar-user');
    }
}
