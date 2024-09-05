<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Branch;
use Livewire\Component;

class ExportExcel extends Component
{
    public function render()
    {
        $branches = Branch::all();
        $brands = Brand::all();

        return view('livewire.export-excel', [
            'branches' => $branches,
            'brands' => $brands
        ]);
    }
}
