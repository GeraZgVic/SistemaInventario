<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUsers extends Component
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

        $query = User::orderBy('created_at', 'desc');

        // Filtra los inventarios que coinciden con el término de búsqueda proporcionado por el usuario
        if ($this->search) {
            $query->where(function ($innerQuery) {
                $innerQuery->where('email', 'LIKE', "%" . $this->search . "%")
                    ->orWhere('name', 'LIKE', "%" . $this->search . "%");
            });
        }

        $users = $query->paginate(4);

        return view('livewire.show-users', [
            'users' => $users
        ]);
    }
}
