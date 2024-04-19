<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'date',
        'quantity',
        'brand',
        'model',
        'serial_number',
        'status',
        'description'
    ];


    // Una sucursal pertenece a un inventario
    public function Branch()
    {
        return $this->belongsTo(Branch::class); //Relación de pertenencia
    }
}
