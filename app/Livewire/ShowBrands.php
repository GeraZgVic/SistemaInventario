<?php

namespace App\Livewire;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;


class ShowBrands extends Component
{
    
    use WithPagination;

    // #[Url] //Si queremos que muestre la URL
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        $query = Brand::orderBy('created_at', 'desc');

        // Filtra los inventarios que coinciden con el término de búsqueda proporcionado por el usuario
        if ($this->search) {
            $query->where(function ($innerQuery) {
                $innerQuery->where('name', 'LIKE', "%" . $this->search . "%");
            });
        }

        $brands = $query->paginate(4);

        return view('livewire.show-brands', [
            'brands' => $brands
        ]);
    }
}
