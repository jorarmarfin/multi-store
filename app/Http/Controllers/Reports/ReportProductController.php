<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Http\Traits\ProductTrait;
use App\Http\Traits\ReportsTrait;
use PDF;
class ReportProductController extends Controller
{
    use ReportsTrait,ProductTrait;
    public function pdf()
    {
        $this->InitPdf('Reporte de Productos');
        $data = $this->getProductsFromExport();
        $this->reportTitle('Reporte de Productos');
        $columns = [
            ['key' => 'code', 'label' => 'Código', 'width' => 20],
            ['key' => 'name', 'label' => 'Nombre', 'width' => 115],
            ['key' => 'unit_name', 'label' => 'Unidad', 'width' => 35],
        ];
        $this->reportTableHeader($columns,15,41,true);

        $this->reportRenderData(
            $data,
            $columns,
            x: 15,
            startY: 47,
            withIndex: true,
            limit: 45
        );

        $this->outputPdf('reporte_productos');
    }

}
