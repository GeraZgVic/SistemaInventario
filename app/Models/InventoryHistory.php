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
}
