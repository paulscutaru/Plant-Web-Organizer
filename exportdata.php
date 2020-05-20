<?php
/*Script care exporta statistici pentru user */
require 'core/init.php';
protected_page();
$id = $_SESSION['user_id'];
$query = "SELECT * FROM plants where id_user='$id'";
$result = mysqli_query($con, $query);
if ($result) { 
    while ($row = mysqli_fetch_assoc($result)) { 
        $results_post[] = $row;
    }
}
ob_start();
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 10);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('times', 'B', 10);
$pdf->Cell(50, 7, "ID");
$pdf->Cell(30, 7, "Photo");
$pdf->Cell(40, 7, "Name");
$pdf->Cell(40, 7, "Region");
$pdf->Cell(40, 7, "Color");
$pdf->Cell(40, 7, "Uses");
$pdf->Cell(40, 7, "Others");
$pdf->Cell(40, 7, "Date");
$pdf->Ln();
$pdf->Cell(450, 7, "----------------------------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Ln();
foreach ($results_post as $pdf_row) {
    $id = $pdf_row["id"];
    $photo = $pdf_row["photo"];
    $name = $pdf_row["name"];
    $region = $pdf_row["region"];
    $color = $pdf_row["color"];
    $uses = $pdf_row["uses"];
    $others = $pdf_row["others"];
    $date = $pdf_row["date"];
    $pdf->Cell(30, 7, $id);
    $pdf->Cell(50, 7, $photo);
    $pdf->Cell(40, 7, $name);
    $pdf->Cell(40, 7, $region);
    $pdf->Cell(40, 7, $color);
    $pdf->Cell(40, 7, $uses);
    $pdf->Cell(40, 7, $others);
    $pdf->Cell(40, 7, $date);
    $pdf->Ln();
}
$pdf->Cell(450, 7, "----------------------------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Output('F', 'filename.pdf');
ob_end_flush();

$fp = fopen('results.json', 'w');
$csv = fopen('results.csv', 'w');
fwrite($fp, json_encode($results_post));
foreach ($results_post as $fields) {
    $res_array = (array) $fields;
    fputcsv($csv, $res_array);
}
fgets($csv, 4096);
fclose($csv);
fclose($fp);

header("Location: home.php");
exit();
