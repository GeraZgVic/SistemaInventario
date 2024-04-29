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

        // Función para convertir un número en su forma ordinal (primer, segundo, tercero, etc.)
        $ordinal = function ($number) {
            $suffix = [' Actualización', ' Actualización', ' Actualización', ' Actualización', ' Actualización', ' Actualización', ' Actualización', ' Actualización', ' Actualización', ' Actualización'];
            $ordinals = ['Primer', 'Segunda', 'Tercera', 'Cuarta', 'Quinta', 'Sexta', 'Séptima', 'Octava', 'Novena', 'Décima'];
            if (($number % 100) >= 11 && ($number % 100) <= 13) {
                return $number . '°';
            }
            return $ordinals[$number - 1] . $suffix[$number - 1];
        };

        return view('inventario.show', [
            'product' => $product,
            'historial' => $historial,
            'ordinal' => $ordinal
        ]);
    }


    public function index()
    {
        return view('dashboard');
    }
}
