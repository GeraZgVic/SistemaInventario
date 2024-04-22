<?php

namespace App\Http\Controllers;

use App\Models\Inventory;

class DashboardController extends Controller
{
    public function show($id) {
        
        $product = Inventory::find($id);

        return view('inventario.show', [
            'product' => $product
        ]);
    }


    public function index() {
        return view('dashboard');
    }
}
