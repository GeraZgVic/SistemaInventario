<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ModalEditUser extends Component
{
    public $id;
    public $user;
    public $name;
    public $email;
    public $password;
    public $password_confirm;
    public $roles;
    public $roless = [];

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->user->id),
            ],
        ];
    }

    public function mount()
    {
        $this->roles = Role::all();
        $this->user = User::find($this->id);

        // Marcar los checkboxes correspondientes a los roles asignados al usuario
        foreach ($this->roles as $rol) {
            if ($this->user->roles->contains($rol->id)) {
                $this->roless[] = $rol->id;
            }
        }

        // Sincronizar formulario con la DB
        $this->name = $this->user['name'];
        $this->email = $this->user['email'];
    }

    public function update()
    {
        $datos = $this->validate();

        // Actualizar los campos del usuario
        // Llenar el modelo de usuario con los datos validados
        $this->user->fill($datos);

        // Verificar si se ha proporcionado una nueva contraseña
        if (!empty($this->password)) {
            $this->user->password = Hash::make($this->password);
            // Anular la marca de tiempo de verificación de correo electrónico
            $this->user->email_verified_at = null;
        }

        // Guardar los cambios en el usuario
        $this->user->save();

        // Sincronizar los roles seleccionados
        if (!empty($this->roless)) {
            $roles = Role::whereIn('id', $this->roless)->get(); // Obtener los roles seleccionados
            $this->user->syncRoles($roles); // Sincronizar los roles con el usuario
        } else {
            $this->user->syncRoles([]); // Si no se seleccionan roles, eliminar todos los roles asociados
        }

        return redirect()->route('users.index')->with('alert-success', 'Se Editó Correctamente');
    }


    public function render()
    {
        return view('livewire.modal-edit-user');
    }
}
