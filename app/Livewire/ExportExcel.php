<?php

namespace App\Livewire;

use App\Models\Branch;
use Livewire\Component;

class ExportExcel extends Component
{
    public function render()
    {
        $branches = Branch::all();

        return view('livewire.export-excel', [
            'branches' => $branches
        ]);
    }
}
