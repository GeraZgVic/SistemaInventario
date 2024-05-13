<?php

namespace App\Livewire;

use App\Models\InventoryHistory;
use Livewire\Component;

class DeleteHistory extends Component
{
    public $id;
    public $nombre;
    public $idProduct;


    public function delete()
    {
        $inventoryHistory = InventoryHistory::find($this->id);
        $inventoryHistory->delete();
        
        return redirect()->route('inventory.show', $this->idProduct)->with('alert-danger', 'Se Eliminó Correctamente');
    }

    public function render()
    {
        return view('livewire.delete-history', [
            'nombre' => $this->nombre = auth()->user()->name
        ]);
    }
}
