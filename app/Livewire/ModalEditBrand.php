<?php

namespace App\Livewire;

use App\Models\Brand;
use Livewire\Component;

class ModalEditBrand extends Component
{

    public $id;
    public $name;
    public $brands;

    public function mount() {
        $this->brands = Brand::find($this->id);
        // Sincronizar
        $this->name = $this->brands['name'];
    }
    
    public function update() {
        $validated = $this->validate([
            'name' => 'required'
        ]);

        $this->brands->update($validated);

        return redirect()->route('brands.index')->with('alert-success', 'ACTUALIZADO CORRECTAMENTE');
    }

    public function render()
    {
    
        return view('livewire.modal-edit-brand');
    }
}
