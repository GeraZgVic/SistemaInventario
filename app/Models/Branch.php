<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address'];

    // Una sucursal puede tener muchos elementos en el inventario
    public function inventory()
    {
        return $this->hasMany(Inventory::class); //Uno a muchos
    }

}
