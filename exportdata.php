<?php
/*Script care exporta statistici pentru user */
require 'core/init.php';
protected_page();
$id = $_SESSION['user_id'];

//statistici despre plante
ob_start();
$pdf = new FPDF();
$fp = fopen('results.json', 'w');
$csv = fopen('results.csv', 'w');
$pdf->AddPage();
$pdf->SetFont('times', 'B', 10);
$pdf->Cell(37, 10, "Number of plants per region");
$pdf->Ln();
$pdf->Cell(500, 10, "---------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Ln();
$results_post = array();
$query = "SELECT DISTINCT region FROM plants where id_user='$id'";
$result = mysqli_query($con, $query);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $results_post[] = $row;
    }
}
foreach ($results_post as $row) {
    $res_array = array();
    foreach ($row as $element) {
        //PDF
        $query2 = "SELECT COUNT(id) FROM plants where id_user='$id' and region='$element'";
        $result2 = mysqli_query($con, $query2);
        $count = mysqli_fetch_row($result2);
        $pdf->Cell(37, 10, $element);
        $pdf->Cell(37, 10, $count[0]);
        $pdf->Ln();
        //JSON
        $res_array[] = array('item' => $element, 'number of elements' => $count[0]);
        fwrite($fp, json_encode($res_array));
        //CSV
        foreach ($res_array as $fields)
            fputcsv($csv, $fields);
    }
}

$pdf->Cell(37, 20, "Number of plants per color");
$pdf->Ln();
$pdf->Cell(500, 10, "---------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Ln();
$results_post = array();
$query = "SELECT DISTINCT color FROM plants where id_user='$id'";
$result = mysqli_query($con, $query);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $results_post[] = $row;
    }
}
foreach ($results_post as $row) {
    $res_array = array();
    foreach ($row as $element) {
        //PDF
        $query2 = "SELECT COUNT(id) FROM plants where id_user='$id' and color='$element'";
        $result2 = mysqli_query($con, $query2);
        $count = mysqli_fetch_row($result2);
        $pdf->Cell(37, 10, $element);
        $pdf->Cell(37, 10, $count[0]);
        $pdf->Ln();
        //JSON
        $res_array[] = array('item' => $element, 'number of elements' => $count[0]);
        fwrite($fp, json_encode($res_array));
        //CSV
        foreach ($res_array as $fields)
            fputcsv($csv, $fields);
    }
}


$pdf->Cell(37, 20, "Number of plants per use");
$pdf->Ln();
$pdf->Cell(500, 10, "---------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Ln();
$results_post = array();
$query = "SELECT DISTINCT `uses` FROM plants where id_user='$id'";
$result = mysqli_query($con, $query);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $results_post[] = $row;
    }
}
foreach ($results_post as $row) {
    $res_array = array();
    foreach ($row as $element) {
        //PDF
        $query2 = "SELECT COUNT(id) FROM plants where id_user='$id' and uses='$element'";
        $result2 = mysqli_query($con, $query2);
        $count = mysqli_fetch_row($result2);
        $pdf->Cell(37, 10, $element);
        $pdf->Cell(37, 10, $count[0]);
        $pdf->Ln();
        //JSON
        $res_array[] = array('item' => $element, 'number of elements' => $count[0]);
        fwrite($fp, json_encode($res_array));
        //CSV
        foreach ($res_array as $fields)
            fputcsv($csv, $fields);
    }
}


$pdf->Cell(37, 20, "Number of plants / others");
$pdf->Ln();
$pdf->Cell(500, 10, "---------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Ln();
$results_post = array();
$query = "SELECT DISTINCT `others` FROM plants where id_user='$id'";
$result = mysqli_query($con, $query);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $results_post[] = $row;
    }
}
foreach ($results_post as $row) {
    $res_array = array();
    foreach ($row as $element) {
        //PDF
        $query2 = "SELECT COUNT(id) FROM plants where id_user='$id' and others='$element'";
        $result2 = mysqli_query($con, $query2);
        $count = mysqli_fetch_row($result2);
        $pdf->Cell(37, 10, $element);
        $pdf->Cell(37, 10, $count[0]);
        $pdf->Ln();
        //JSON
        $res_array[] = array('item' => $element, 'number of elements' => $count[0]);
        fwrite($fp, json_encode($res_array));
        //CSV
        foreach ($res_array as $fields)
            fputcsv($csv, $fields);
    }
}


$pdf->Cell(37, 20, "Number of plants / date");
$pdf->Ln();
$pdf->Cell(500, 10, "---------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Ln();
$results_post = array();
$query = "SELECT DISTINCT `date` FROM plants where id_user='$id'";
$result = mysqli_query($con, $query);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $results_post[] = $row;
    }
}
foreach ($results_post as $row) {
    $res_array = array();
    foreach ($row as $element) {
        //PDF
        $query2 = "SELECT COUNT(id) FROM plants where id_user='$id' and `date`='$element'";
        $result2 = mysqli_query($con, $query2);
        $count = mysqli_fetch_row($result2);
        $pdf->Cell(37, 10, $element);
        $pdf->Cell(37, 10, $count[0]);
        $pdf->Ln();
        //JSON
        $res_array[] = array('item' => $element, 'number of elements' => $count[0]);
        fwrite($fp, json_encode($res_array));
        //CSV
        foreach ($res_array as $fields)
            fputcsv($csv, $fields);
    }
}


$pdf->Cell(37, 20, "Number of plants per album");
$pdf->Ln();
$pdf->Cell(500, 10, "---------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Ln();
$results_post = array();
$query = "SELECT `name` FROM albums where id_user='$id'";
$result = mysqli_query($con, $query);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $results_post[] = $row;
    }
}
foreach ($results_post as $row) {
    $res_array = array();
    foreach ($row as $element) {
        //PDF
        $id_album = get_album_id($con, $element, $id);
        $query2 = "SELECT COUNT(*) FROM plants WHERE id_user=$id AND id_album=$id_album";
        $result2 = mysqli_query($con, $query2);
        $count = mysqli_fetch_row($result2);
        $pdf->Cell(37, 10, $element);
        $pdf->Cell(37, 10, $count[0]);
        //JSON
        $res_array[] = array('item' => $element, 'number of elements' => $count[0]);
        fwrite($fp, json_encode($res_array));
        //CSV
        foreach ($res_array as $fields)
            fputcsv($csv, $fields);
        $pdf->Ln();
    }
}

$pdf->Output('F', 'results.pdf');
ob_end_flush();

$zip = new ZipArchive;
if ($zip->open('results.zip', ZipArchive::CREATE) === TRUE) {
    $zip->addFile('results.csv');
    $zip->addFile('results.pdf');
    $zip->addFile('results.json');
    $zip->close();
}
fclose($csv);
fclose($fp);

$file = "results.zip";
$filetype = filetype($file);
$filename = basename($file);

header("Content-Type: " . $filetype);

header("Content-Length: " . filesize($file));

header("Content-Disposition: attachment; filename=" . $filename);

readfile($file);
