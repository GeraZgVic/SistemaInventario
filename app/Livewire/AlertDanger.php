<?php

namespace App\Livewire;

use Livewire\Component;

class AlertDanger extends Component
{
    public $texto;
    
    public function render()
    {
        return view('livewire.alert-danger');
    }
}
