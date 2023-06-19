<?php
include('../db.php');

$id = $_POST['id'];
$sql = "SELECT * FROM news WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
require('../fpdf/fpdf.php');

// Create new PDF document
$pdf = new FPDF();
$pdf->SetTitle('SMS');
$pdf->SetAuthor('Djihad Dris');
$pdf->SetCreator('SMS');
// Add a page
$pdf->AddPage();
//to set the custom font 
$pdf->AddFont('AlArabiya', '', 'AlArabiya.php', true, 'unic');
$pdf->SetFont('AlArabiya', '', 12, '', true, 'UTF-8');

// Custom content using text
$pdf->Cell(0, 10, $row['name'], 0, 1, 'C');  // Center-aligned heading
$pdf->Cell(0, 10, 'Name: ' . $row['des'], 0, 1, 'R');  // Right-aligned content

// Output the PDF
$pdf->Output('SMS.pdf', 'I');
  }}
$conn->close();
?>