<?php
require('fpdf.php');
$db = new PDO('mysql:host=localhost;dbname=ashabul2_sipak', 'root', '');


class myPDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        // $this->Image('askaf.png', 10, 6);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 14);
        // Move to the right
        // $this->Cell(80);
        // Title
        $this->Cell(276, 5, 'LAPORAN PELANGGARAN SANTRI ', 0, 0, 'C');
        // Line break
        $this->Ln();
        $this->SetFont('Times', '', 12);
        $this->Cell(276, 10, 'Pondok Pesantren Ashabul Kahfi Malang', 0, 0, 'C');
        $this->Ln(20);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', '', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
    function headerTable()
    {
        $this->SetFont('Times', 'B', 12);
        $this->Cell(23, 10, 'Tanggal', 1, 0, 'C');
        $this->Cell(15, 10, 'Waktu', 1, 0, 'C');
        $this->Cell(45, 10, 'Nama Santri', 1, 0, 'C');
        $this->Cell(45, 10, 'Nama Ayah', 1, 0, 'C');
        $this->Cell(43, 10, 'Pelanggaran', 1, 0, 'C');
        $this->Cell(54, 10, 'Tindakan', 1, 0, 'C');
        $this->Cell(37, 10, 'Penanggung Jawab', 1, 0, 'C');
        $this->Cell(22, 10, 'Keterangan', 1, 0, 'C');
        $this->Ln();
    }
    function viewTable($db)
    {
        $this->SetFont('Times', '', 12);
        $byr = $db->query('select * from pelanggaran');
        while ($data = $byr->fetch(PDO::FETCH_OBJ)) {
            $this->Cell(23, 10, $data->tanggal, 1, 0, 'L');
            $this->Cell(15, 10, $data->waktu, 1, 0, 'L');
            $this->Cell(45, 10, $data->nama_santri, 1, 0, 'L');
            $this->Cell(45, 10, $data->nama_ayah, 1, 0, 'L');
            $this->Cell(43, 10, $data->pelanggaran, 1, 0, 'L');
            $this->Cell(54, 10, $data->tindakan, 1, 0, 'L');
            $this->Cell(37, 10, $data->penanggungjawab, 1, 0, 'L');
            $this->Cell(22, 10, $data->keterangan, 1, 0, 'L');
            $this->Ln();
        }
    }
}





// Instanciation of inherited class
$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4', 0);
$pdf->SetFont('Times', '', 12);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();
