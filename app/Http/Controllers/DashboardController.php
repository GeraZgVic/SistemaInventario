<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\InventoryHistory;

class DashboardController extends Controller
{
    public function show($id)
    {

        $product = Inventory::find($id);

        $historial = InventoryHistory::where('inventory_id', $id)->get();

        return view('inventario.show', [
            'product' => $product,
            'historial' => $historial,
        ]);
    }


    public function index()
    {
        return view('dashboard');
    }
}
