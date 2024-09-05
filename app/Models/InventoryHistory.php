<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryHistory extends Model
{
    use HasFactory;

    protected $fillable = ['inventory_id', 'original_attributes'];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

     // Una sucursal pertenece a un inventario
     public function Branch()
     {
         return $this->belongsTo(Branch::class); //Relación de pertenencia
     }
     // Una marca pertenece a un producto del inventario
     public function Brand()
     {
         return $this->belongsTo(Brand::class); //Relación de pertenencia
     }
}
