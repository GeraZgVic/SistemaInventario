<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Branch;
use Livewire\Component;
use App\Models\Inventory;
use Livewire\WithFileUploads;
use App\Models\InventoryDetails;
use Livewire\Attributes\Validate;

class ModalEditar extends Component
{
    use WithFileUploads;

    public $id;
    public $inventory;
    // #[Validate('required')]
    // public $quantity;

    #[Validate('required')]
    public $brand_id;
    #[Validate('max:40')]
    public $model;
    #[Validate('required')]
    public $status;
    #[Validate('required')]
    public $description;
    #[Validate('required')]
    public $branch_id;
    #[Validate('nullable|max:100')]
    public $serial_number;
    #[Validate('nullable')]
    public $wholesaler;
    public $image;
    #[Validate('image|max:1024|nullable')]
    public $new_image;
    #[Validate('nullable|max:200')]
    public $part_number;

    // Campos Opcionales - Table: Inventory Details
    public $destination;
    public $previous_inventory_number;
    public $later_inventory_number;
    public $departure_date;


    public function mount()
    {
        $this->inventory = Inventory::find($this->id);
        // Sincronizar formulario con la DB
        $this->brand_id = $this->inventory['brand_id'];
        $this->model = $this->inventory['model'];
        $this->status = $this->inventory['status'];
        $this->image = $this->inventory['image'];
        $this->wholesaler = $this->inventory['wholesaler'];
        $this->description = $this->inventory['description'];
        $this->branch_id = $this->inventory['branch_id'];
        $this->serial_number = $this->inventory['serial_number'];
        $this->part_number = $this->inventory['part_number'];
    }

    public function update()
    {
        $datos = $this->validate();

        if ($this->new_image) {
            $imagen = $this->new_image->store('public/images'); //Retornar la imagen nueva con el 'public/images'
            $datos['image'] = str_replace('public/images/', '', $imagen); // Retorna la nueva imagen sin el 'public/images'
        }

        $this->inventory->update([
            'brand_id' => $datos['brand_id'],
            'part_number' => $datos['part_number'],
            'model' => $datos['model'],
            'serial_number' => $this->serial_number,
            'status' => $datos['status'],
            'description' => $datos['description'],
            'wholesaler' => $datos['wholesaler'],
            'branch_id' => $datos['branch_id'],
            'image' => $datos['image'] ?? $this->image
        ]);

        // OPCIONALES 
        if (!empty($this->destination) || !empty($this->previous_inventory_number) || !empty($this->later_inventory_number) || !empty($this->departure_date)) {
            InventoryDetails::create([
                'inventory_id' => $this->id,
                'destination' => $this->destination,
                'previous_inventory_number' => $this->previous_inventory_number,
                'later_inventory_number' => $this->later_inventory_number,
                'departure_date' => $this->departure_date
            ]);
        }


        return redirect()->route('dashboard')->with('alert-success', 'Se Actualizó Correctamente');
    }

    public function render()
    {
        $branches = Branch::all();
        $brands = Brand::all();
        return view('livewire.modal-editar', [
            'branches' => $branches,
            'brands' => $brands
        ]);
    }
}
