<?php

namespace App\Livewire;

use App\Models\Branch;
use App\Models\Inventory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class ModalAgregar extends Component
{
    use WithFileUploads;
    // #[Validate('required')]
    // public $quantity;

    #[Validate('required')]
    public $brand;
    #[Validate('nullable|max:100')]
    public $model;
    #[Validate('required')]
    public $status;
    #[Validate('required')]
    public $description;
    #[Validate('required')]
    public $branch_id;
    #[Validate('image|max:1024|nullable')]
    public $image;
    #[Validate('nullable')]
    public $wholesaler;
    #[Validate('nullable|max:100')]
    public $serial_number;

    public function save()
    {
        $datos = $this->validate();

        // Lógica para Imagen
        if ($this->image) {
            $imagen = $this->image->store(path: 'public/images');
            $datos['image'] = str_replace('public/images/', '', $imagen);
        }
        
        $nombreImagen = $datos['image'];

        Inventory::create([
            'brand' => $datos['brand'],
            // 'quantity' => $datos['quantity'],
            'model' => $datos['model'],
            'serial_number' => $this->serial_number,
            'status' => $datos['status'],
            'description' => $datos['description'],
            'branch_id' => $datos['branch_id'],
            'wholesaler' => $datos['wholesaler'],
            'image' => $nombreImagen
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
