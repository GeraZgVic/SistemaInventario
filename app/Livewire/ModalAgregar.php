<?php

namespace App\Livewire;

use App\Models\Branch;
use App\Models\Inventory;
use Livewire\Component;
use Livewire\Attributes\Validate;

class ModalAgregar extends Component
{
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

    public function save() 
    {
        $datos = $this->validate();
        
        Inventory::create([
            'brand' => $datos['brand'],
            'quantity' => $datos['quantity'],
            'model' => $datos['model'],
            'serial_number' => $this->serial_number,
            'status' => $datos['status'],
            'description' => $datos['description'],
            'branch_id' => $datos['branch_id']
        ]);

        return redirect()->route('dashboard')->with('alert-success', 'Se Agregó Correctamente');
    }

    public function render()
    {
        $branches = Branch::all();

        return view('livewire.modal-agregar', [
            'branches' => $branches
        ]);
    }
}
