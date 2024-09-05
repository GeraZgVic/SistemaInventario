<?php

namespace App\Livewire;

use App\Models\Brand;
use Livewire\Component;

class DeleteBrand extends Component
{
    public $id;
    public $nombre;

    public function delete()
    {
        $brand = Brand::find($this->id);
    
        $brand->delete();
        return redirect()->route('brands.index')->with('alert-danger', 'ELIMINADO CORRECTAMENTE');
    }

    public function render()
    {
        return view('livewire.delete-brand',[
            'nombre' =>  $this->nombre = auth()->user()->name
        ]);
    }
}
