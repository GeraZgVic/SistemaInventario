<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class DeleteUser extends Component
{
    
    public $id;
    public $nombre;

    public function delete()
    {
        $user = User::find($this->id);
        $user->delete();
        return redirect()->route('users.index')->with('alert-danger', 'Se Eliminó Correctamente');
    }
    public function render()
    {
        return view('livewire.delete-user', [
            'nombre' =>  $this->nombre = auth()->user()->name
        ]);
    }
}
