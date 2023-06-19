<?php
include('../db.php');

$id = $_GET['id'];
$sql = "SELECT * FROM news WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
$name = $row['name'];
$des = $row['des'];
require('../fpdf/fpdf.php');

// Create new PDF document
$pdf = new FPDF();
$pdf->SetTitle('Download');
$pdf->SetAuthor('Djihad Dris');
$pdf->SetCreator('SMS');
// Add a page
$pdf->AddPage();
$pdf->AddFont('AlArabiya', '', 'AlArabiya.php', true, 'unic');
//to set the custom font 
$pdf->SetFont('AlArabiya', '', 12, '', true, 'UTF-8');

// Custom content using text
$pdf->Cell(0, 10, $name, 0, 1, 'C');  // Center-aligned heading
$pdf->Cell(0, 10, $des, 0, 1, 'R');  // Left-aligned content

// Output the PDF
$pdf->Output('Download - SMS.pdf', 'I');
  }}
$conn->close();
?>