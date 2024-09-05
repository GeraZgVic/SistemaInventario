<?php

namespace App\Livewire;

use App\Models\Brand;
use Livewire\Component;

class ModalAgregarBrand extends Component
{
    public $name;

    public function save() {

        $validated = $this->validate([
            'name' => 'required'
        ]);

        Brand::create($validated);

        return redirect()->route('brands.index')->with('alert-success', 'AGREGADO CORRECTAMENTE');
    }

    public function render()
    {
        return view('livewire.modal-agregar-brand');
    }
}
