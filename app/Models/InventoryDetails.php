<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryDetails extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'inventory_id',
        'destination',
        'previous_inventory_number',
        'later_inventory_number',
        'departure_date'
    ];

    // Inventario Pertenece a InventoryDetails
    public function inventory() {
        return $this->belongsTo(Inventory::class);
    }


}
