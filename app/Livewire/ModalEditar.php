<?php

namespace App\Livewire;

use App\Models\Branch;
use Livewire\Component;
use App\Models\Inventory;
use Livewire\Attributes\Validate;

class ModalEditar extends Component
{
    public $id;
    public $inventory;

    #[Validate('required')]
    public $brand;
    #[Validate('required')]
    public $quantity;
    #[Validate('max:40')]
    public $model;
    #[Validate('required')]
    public $status;
    #[Validate('required')]
    public $description;
    #[Validate('required')]
    public $branch_id;
    public $serial_number;


    public function mount() {
        $this->inventory = Inventory::find($this->id);
        // Sincronizar formulario con la DB
        $this->brand = $this->inventory['brand'];
        $this->quantity = $this->inventory['quantity'];
        $this->model = $this->inventory['model'];
        $this->status = $this->inventory['status'];
        $this->description = $this->inventory['description'];
        $this->branch_id = $this->inventory['branch_id'];
        $this->serial_number = $this->inventory['serial_number'];
    }

    public function update() 
    {
        $datos = $this->validate();

        $this->inventory->update([
            'brand' => $datos['brand'],
            'quantity' => $datos['quantity'],
            'model' => $datos['model'],
            'serial_number' => $this->serial_number,
            'status' => $datos['status'],
            'description' => $datos['description'],
            'branch_id' => $datos['branch_id']
        ]);

        return redirect()->route('dashboard')->with('alert-success', 'Se Editó Correctamente');
    }

    public function render()
    {
        $branches = Branch::all();
        return view('livewire.modal-editar', [
            'branches' => $branches
        ]);
    }
}
