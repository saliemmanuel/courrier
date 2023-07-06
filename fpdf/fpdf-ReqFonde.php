<?php
require("../db.php");
require("fpdf/fpdf.php");

$reque = "SELECT DISTINCT requete.`id_Requete`, requete.`code_UE`, 
requete.`Objet_Req`, requete.`Commentaire_Req`, requete.`PiecesJust_Req`, 
requete.`DateDepot_Req`, requete.`id_Etudiant`, requete.`id_Depart`, etudiant.NomComplet_Etudiant FROM requete, 
etudiant WHERE NOT EXISTS ( SELECT NULL FROM resultat WHERE resultat.id_Requete = requete.id_Requete 
AND `requete`.`id_Depart` = 3 ) ORDER BY requete.id_Requete DESC";
$a = $bdd->prepare($reque);
$a->execute(array());

//Creation d'un pdf pr le recapitulatif des requete fondé
 $pdf = new FPDF('L','mm','A4');
 $pdf->AddPage();
 $pdf->SetFont('helvetica','',10);
 
 $taile = array(20, 50, 40, 40, 40);
 $pdf->SetFillColor(192, 229, 252);
 $pdf->Cell($taile[0],10,'ID',1,0,'C',true);
 $pdf->Cell($taile[0],10,'code',1,0,'C',true);
 $pdf->Cell($taile[0],10,'obj',1,0,'C',true);
 $pdf->Cell($taile[0],10,'date',1,0,'C',true);
 $pdf->Cell($taile[0],10,'ID_etu',1,0,'C',true);


// $pdf = new FPDF(); 
// $pdf->AddPage();
// $pdf->SetFont('Arial','B',12);

// $width_cell=array(10,30,20,30);
// $pdf->SetFillColor(193,229,252); // Background color of header 
// // Header starts /// 
// $pdf->Cell($width_cell[0],10,'ID',1,0,'C',true); // First header column 
// $pdf->Cell($width_cell[1],10,'NAME',1,0,'C',true); // Second header column
// $pdf->Cell($width_cell[2],10,'CLASS',1,0,'C',true); // Third header column 
// $pdf->Cell($width_cell[3],10,'MARK',1,1,'C',true); // Fourth header column
// //// header is over ///////

$pdf->SetFont('Arial','',10);
$fill = true;
foreach($bdd->query($reque) as $row){
    $pdf->Cell($taile[0],10,$row["id_Requete"],1,0,'C',$fill);
    $pdf->Cell($taile[0],10,$row["code_UE"],1,0,'L',$fill);
    // $pdf->Ln(20);
    // $pdf->Cell($taile[0],10,$row["id_Requete"],0,0,'C',$fill);
    // $pdf->Cell($taile[0],10,$row["code_UE"],0,0,'L',$fill);
    // $pdf->Cell($taile[0],10,$row["NomComplet_Etudiant"],0,0,'C',$fill);
    // $pdf->Cell($taile[0],10,$row["Objet_Req"],0,0,'C',$fill);
    // $pdf->Cell($taile[0],10,$row["id_Depart"],0,0,'C',$fill);
    // $fill = !$fill;
    // //

    // $pdf->Cell($width_cell[0],10,$row["id_Requete"],1,0,'C',false); // First column of row 1 
    // $pdf->Cell($width_cell[1],10,$row["code_UE"],1,0,'C',false); // Second column of row 1 
    // $pdf->Cell($width_cell[2],10,$row["NomComplet_Etudiant"],1,0,'C',false); // Third column of row 1 
    // $pdf->Cell($width_cell[3],10,$row["Objet_Req"],1,1,'C',false); 
    // $pdf->CellFit($table_head2[7],$table_height,$item['remark'],1,0,'C',0,'',1,0);
}

$pdf->Output();
