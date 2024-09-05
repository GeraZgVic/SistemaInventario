<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Branch;
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
        // Carga el historial con las relaciones necesarias
        $historial = InventoryHistory::with(['brand', 'branch'])
            ->where('id', $id)
            ->get();

        $inventoryId = $historial->first()->inventory_id;
        $product = Inventory::find($inventoryId);

        // Preprocesa datos para la vista
        $historialData = $historial->map(function ($registro) {
            $originalAttributes = json_decode($registro->original_attributes, true);
            $brandName = Brand::find($originalAttributes['brand_id'])->name ?? 'N/A';
            $branchName = Branch::find($originalAttributes['branch_id'])->name ?? 'N/A';
            return [
                'registro' => $registro,
                'originalAttributes' => $originalAttributes,
                'brandName' => $brandName,
                'branchName' => $branchName,
            ];
        });

        return view('inventario.showHistory', [
            'historialData' => $historialData,
            'product' => $product,
            'historial' => $historial
        ]);
    }


    public function index()
    {
        return view('dashboard');
    }
}
