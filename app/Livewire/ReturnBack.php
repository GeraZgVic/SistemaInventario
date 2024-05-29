<?php

namespace App\Livewire;

use Livewire\Component;

class ReturnBack extends Component
{
    public $routeName;
    public $routeParams = [];

    public function render()
    {
        return view('livewire.return-back', [
            'url' => route($this->routeName, $this->routeParams)
        ]);
    }
}
