<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Inventory;

class DeleteInventory extends Component
{
    public $id;
    public $nombre;

    public function delete()
    {
        $inventory = Inventory::find($this->id);
        $inventory->delete();
        return redirect()->route('dashboard')->with('alert-danger', 'Se Eliminó Correctamente');
    }

    public function render()
    {
        $this->nombre = auth()->user()->name;
        return view('livewire.delete-inventory', [
            'nombre' => $this->nombre
        ]);
    }
}
