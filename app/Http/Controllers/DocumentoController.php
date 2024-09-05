<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\InventoryExport;
use Maatwebsite\Excel\Facades\Excel;


class DocumentoController extends Controller
{
    public function export(Request $request) 
    {

        $branch_id = $request->input('branch_id'); // Obtener el id de la sucursal seleccionada.
        $brand_id = $request->input('brand_id'); // Obtener el id de la sucursal seleccionada.

        $timestamp = now()->format('Ymd'); // Utiliza el formato de fecha actual
        $random = Str::random(2); // Genera una cadena aleatoria de 2 caracteres
        $filename = "inventario_arsite_{$timestamp}_{$random}.xlsx"; // Nombre del archivo

        return Excel::download(new InventoryExport($branch_id, $brand_id), $filename);
    }
}
