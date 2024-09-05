<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Branch;
use Livewire\Component;
use App\Models\Inventory;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class ModalAgregar extends Component
{
    use WithFileUploads;
  
    #[Validate('required')]
    public $brand_id;
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
    #[Validate('nullable|max:200')]
    public $part_number;


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
            'brand_id' => $datos['brand_id'],
            'part_number' => $datos['part_number'],
            'model' => $datos['model'],
            'serial_number' => $this->serial_number,
            'status' => $datos['status'],
            'description' => $datos['description'],
            'branch_id' => $datos['branch_id'],
            'wholesaler' => $datos['wholesaler'],
            'image' => $nombreImagen
        ]);

        return redirect()->route('dashboard')->with('alert-success', 'AGREGADO CORRECTAMENTE');
    }

    public function render()
    {
        $branches = Branch::all();
        $brands = Brand::all();

        return view('livewire.modal-agregar', [
            'branches' => $branches,
            'brands' => $brands
        ]);
    }
}
