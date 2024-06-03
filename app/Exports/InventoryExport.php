<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Inventory;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class InventoryExport implements FromCollection, WithMapping, ShouldAutoSize, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $branch_id;

    // Recibir el ID de la sucursal como parámetro en el constructor
    public function __construct($branch_id)
    {
        $this->branch_id = $branch_id;
    }

    public function collection()
    {
        // Filtrar los inventarios según el ID de la sucursal seleccionada
        $query = Inventory::query();

        if ($this->branch_id) {
            $query->whereHas('branch', function ($innerQuery) {
                $innerQuery->where('id', $this->branch_id);
            });
        }
        return $query->get();
    }
    
    public function map($inventory): array {
        return [
            $inventory->id,
            $inventory->branch->name, // Aquí obtenemos el nombre de la sucursal
            $inventory->brand,
            $inventory->model,
            $inventory->serial_number,
            $inventory->status,
            $inventory->wholesaler,
            $inventory->description,
            Carbon::parse($inventory->created_at)->format('Y-m-d'),
            Carbon::parse($inventory->updated_at)->format('Y-m-d')
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'SUCURSAL',
            'MARCA',
            'MODELO',
            'NUMERO DE SERIE',
            'ESTATUS',
            'MAYORISTA',
            'DESCRIPCIÓN',
            'FECHA DE AGREGADO',
            'FECHA DE ACTUALIZACIÓN',
        ];
    }
    public function styles(Worksheet $sheet)
    {
        // Aplicar bordes a todas las celdas
        $sheet->getStyle($sheet->calculateWorksheetDimension())->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);

        // Aplicar estilo de encabezado
        $sheet->getStyle('A1:J1')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'CCCCCC'],
            ],
        ]);

    }
}
