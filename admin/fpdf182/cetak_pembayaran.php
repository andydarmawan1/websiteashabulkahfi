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
        $this->Cell(276, 5, 'NOTA PEMBAYARAN SPP ', 0, 0, 'C');
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
        $this->Cell(10, 10, 'No', 1, 0, 'C');
        $this->Cell(95, 10, 'Nama Santri', 1, 0, 'C');
        $this->Cell(35, 10, 'Nama Admin', 1, 0, 'C');
        $this->Cell(23, 10, 'Tanggal', 1, 0, 'C');
        $this->Cell(20, 10, 'Waktu', 1, 0, 'C');
        $this->Cell(24, 10, 'Bulan', 1, 0, 'C');
        $this->Cell(20, 10, 'Nominal', 1, 0, 'C');
        $this->Cell(20, 10, 'Terbayar', 1, 0, 'C');
        $this->Cell(25, 10, 'Status', 1, 0, 'C');
        $this->Ln();
    }
    function viewTable($db)
    {
        $this->SetFont('Times', '', 12);
        $byr = $db->query('select * from pembayaran');
        while ($data = $byr->fetch(PDO::FETCH_OBJ)) {
            $this->Cell(10, 10, $data->id_pembayaran, 1, 0, 'C');
            $this->Cell(95, 10, $data->nama_admin, 1, 0, 'L');
            $this->Cell(35, 10, $data->nama_santri, 1, 0, 'L');
            $this->Cell(23, 10, $data->tanggal, 1, 0, 'L');
            $this->Cell(20, 10, $data->waktu, 1, 0, 'L');
            $this->Cell(24, 10, $data->bulan, 1, 0, 'L');
            $this->Cell(20, 10, $data->nominal, 1, 0, 'L');
            $this->Cell(20, 10, $data->terbayar, 1, 0, 'L');
            $this->Cell(25, 10, $data->status, 1, 0, 'L');
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
