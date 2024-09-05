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
        'brand_id',
        'model',
        'serial_number',
        'part_number',
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
    // Una marca pertenece a un producto del inventario
    public function Brand()
    {
        return $this->belongsTo(Brand::class); //Relación de pertenencia
    }

    public function history()
    {
        return $this->hasMany(InventoryHistory::class);
    }

    public function details() {
        return $this->hasOne(InventoryDetails::class);
    }
}
