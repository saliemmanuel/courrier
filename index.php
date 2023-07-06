<?php

require("./fpdf/fpdf.php");
class PDFGenerator extends FPDF
{
    public function PDF_LS(
        $stk,
        $solde,
        $objet,
        $corps
    ) {
        $pdf = new PDFGenerator();
        $pdf->SetFont('Times', '', 12);
        $pdf->SetMargins(18, 16);
        $pdf->AddPage();
        $pdf->Image("logo.jpeg", 50, 10, 120);
        $pdf->Ln(45);
        $pdf->Cell(140);
        $pdf->Cell(30, 10, 'Maroua, le ' . date('D d M Y'), 0, 0, 'C', 0, 0, );

        $pdf->Ln(15);
        $pdf->MultiCell(120, 6, "Objet : $objet", 0, "J", false);
        $pdf->Ln(10);
        $pdf->MultiCell(180, 6, "\t \t \t \t$corps", 0, "J", false);
        $pdf->SetFillColor(183, 183, 183);
        $pdf->Ln(10);
        $pdf->Cell(50, 6, 'NOM', 1, 0, 'C', false);
        $pdf->Cell(35, 6, "NUM TEL", 1, 0, 'C', false);
        $pdf->Cell(35, 6, "MICROZONE", 1, 0, 'C', false);
        $pdf->Cell(30, 6, "SOLDE", 1, 0, 'C', false);
        $pdf->Cell(30, 6, 'TYPE SIM', 1, 0, 'C', false);
        $pdf->Ln(6);
        $pdf->Cell(50, 6, 'SALI EMMANUEL', 0, 0, '', true);
        $pdf->Cell(35, 6, "698066896", 0, 0, '', true);
        $pdf->Cell(35, 6, "KILAROU", 0, 0, '', true);
        $pdf->Cell(30, 6, "13500", 0, 0, '', true);
        $pdf->Cell(30, 6, 'DUAL WALLET', 0, 0, '', true);
        $pdf->Ln(6);
        $pdf->Cell(50, 6, 'ALPHONE MAKEPE', 0, 0, '', false);
        $pdf->Cell(35, 6, "698232317", 0, 0, '', false);
        $pdf->Cell(35, 6, "TRADEX", 0, 0, '', false);
        $pdf->Cell(30, 6, "50600", 0, 0, '', false);
        $pdf->Cell(30, 6, 'E RECHARGE', 0, 0, '', false);
        $pdf->Ln(45);
        $pdf->Cell(120);
        $pdf->Cell(30, 10, 'Fait à Maroua, le ' . date('D d M Y'), 0, 0, 'C', 0, 0, );
        $pdf->Output("", 'DEMANDE' . date('D. d M. Y H:i') . '.pdf', true);
    }
}


// Appel génération pdf
$pdf = new PDFGenerator();
$pdf->PDF_LS(
    "stk",
    "solde",
    "Demande changement de code et CHANSIM",
    "Objet : Demande d'assistance pour leve Objet : Demande d'assistance pour leveObjet : Demande d'assistance pour leveObjet : Demande d'assistance pour leveObjet : Demande d'assistance pour leveObjet : Demande d'assistance pour leveObjet : Demande d'assistance pour leveObjet : Demande d'assistance pour leveObjet : Demande d'assistance pour leveObjet : Demande d'assistance pour leveObjet : Demande d'assistance pour leve Objet : Demande d'assistance pour leveObjet : Demande d'assistance pour leveObjet : Demande d'assistance pour leveObjet : Demande d'assistance pour leveObjet : Demande d'assistance pour leveObjet : Demande d'assistance pour leveObjet : Demande d'assistance pour leveObjet : Demande d'assistance pour leveObjet : Demande d'assistance pour leve"
);