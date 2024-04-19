<?php

namespace App\Http\Controllers;

use App\Models\Inventory;

class DashboardController extends Controller
{
    public function index() {
        $inventories = Inventory::orderBy('created_at','desc')->paginate(6);
        return view('dashboard', [
            'inventories' => $inventories
        ]);
    }
}
