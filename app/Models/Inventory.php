<?php

namespace App\Models;

use App\Observers\InventoryObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[ObservedBy([InventoryObserver::class])] // Llamando Obeservador
class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id',
        // 'date',
        'quantity',
        'brand',
        'model',
        'serial_number',
        'status',
        'image',
        'description',
        'wholesaler'
    ];


    // Una sucursal pertenece a un inventario
    public function Branch()
    {
        return $this->belongsTo(Branch::class); //Relación de pertenencia
    }

    public function history()
    {
        return $this->hasMany(InventoryHistory::class);
    }
}
