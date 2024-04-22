<?php

namespace App\Livewire;

use App\Models\Branch;
use Livewire\Component;
// use Livewire\Attributes\Url;
use App\Models\Inventory;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
// use Livewire\WithoutUrlPagination;

class ShowInventory extends Component
{
    use WithPagination;

    // #[Url] //Si queremos que muestre la URL
    public $search = '';
    public $branch_id = '';


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $query = Inventory::orderBy('created_at', 'desc');

        // Filtra los inventarios que coinciden con el término de búsqueda proporcionado por el usuario
        if ($this->search) {
            $query->where(function ($innerQuery) {
                $innerQuery->where('brand', 'LIKE', "%" . $this->search . "%")
                    ->orWhere('serial_number', 'LIKE', "%" . $this->search . "%")
                    ->orWhere('model', 'LIKE', "%" . $this->search . "%");
            });
        }

        // Filtra los inventarios que tienen una relación con una sucursal
        // y donde el ID de la sucursal coincida con el ID seleccionado por el usuario
        if ($this->branch_id) {
            $query->whereHas('branch', function ($innerQuery) {
                $innerQuery->where('id', $this->branch_id);
            });
        }

        $inventories = $query->paginate(4);
        $branches = Branch::all();

        return view('livewire.show-inventory', [
            'inventories' => $inventories,
            'branches' => $branches
        ]);
    }
}
