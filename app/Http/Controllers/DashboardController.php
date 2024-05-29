<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\InventoryDetails;
use App\Models\InventoryHistory;

class DashboardController extends Controller
{

    public function show($id)
    {

        $product = Inventory::find($id);
        $historial = InventoryHistory::where('inventory_id', $id)->get();

        return view('inventario.show', [
            'product' => $product,
            'historial' => $historial
        ]);
    }

    public function showHistory($id)
    {
        $historial = InventoryHistory::where('id', $id)->get();
        $inventoryId = $historial->first()->inventory_id;
        $product = Inventory::find($inventoryId);

        return view('inventario.showHistory', [
            'historial' => $historial,
            'product' => $product
        ]);
    }


    public function index()
    {
        return view('dashboard');
    }
}
