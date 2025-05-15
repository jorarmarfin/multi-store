<?php

namespace App\Http\Services;
use TCPDF;
class MyCustomPDF extends TCPDF
{
    public string $reportTitle = 'Nombre de la empresa';
    public ?string $logoPath = null;
    public string $footerText = 'MultiStore S.A.C - Todos los derechos reservados.';

    public function Header():void
    {
        if ($this->logoPath && file_exists($this->logoPath)) {
            $this->Image($this->logoPath, 10, 8, 20); // x, y, width
        }

        $this->SetFont('helvetica', 'B', 12);
        $this->SetXY(30, 10);
        $this->Cell(0, 10, $this->reportTitle, 0, 1, 'L');

        $this->Ln(5); // Espacio extra
    }

    public function Footer():void
    {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 5, $this->footerText, 'T', 0, 'L');
        $this->Cell(0, 5, 'Página ' . $this->getAliasNumPage() . ' de ' . $this->getAliasNbPages(), 'T', 0, 'R');
    }
}
