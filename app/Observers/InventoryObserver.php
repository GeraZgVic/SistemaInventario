<?php

namespace App\Observers;

use App\Models\Inventory;
use App\Models\InventoryHistory;

class InventoryObserver
{
    

    /**
     * Handle the Inventory "updated" event.
     */
    public function updating(Inventory $inventory): void
    {
        // Obtener los atributos originales antes de la actualización
        $originalAttributes = $inventory->getOriginal();
        // Guardar los atributos originales en la tabla de historial
        $history = new InventoryHistory();
        $history->inventory_id = $inventory->id;
        $history->original_attributes = json_encode($originalAttributes);
        $history->save();
    }

    /**
     * Handle the Inventory "deleted" event.
     */
    public function deleted(Inventory $inventory): void
    {
        //
    }

}
