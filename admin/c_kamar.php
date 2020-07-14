<?php
  require_once('../config/koneksi.php');
  $call = mysqli_query($con, "SELECT * FROM tbl_tipe");

  require_once('assets/fpdf/fpdf.php');
  $pdf = new FPDF('l','mm','A4');
  $pdf->addPage();
  $pdf->SetTitle('Cetak List Jenis Kamar');
  $pdf->SetFont('Arial','B','16');
  $pdf->Cell(0,0,'List Jenis Kamar Hotel', 0, 1, 'L');

  $pdf->SetFont('Arial','B','12');
  $pdf->Cell(10,20,'',0,1,'L');
  $pdf->Cell(15,10,'No',1,0,'L');
  $pdf->Cell(50,10,'Nama Tipe',1,0,'L');
  $pdf->Cell(170,10,'Deskripsi',1,0,'L');
  $pdf->Cell(30,10,'Tarif',1,0,'L');
  $pdf->Cell(30,10,'Total Kamar',1,1,'L');

  $no=1;
  while($data = mysqli_fetch_array($call)){
  $pdf->SetFont('Arial','B','12');
  $pdf->Cell(15,10,$no,1,0,'L');
  $pdf->Cell(50,10,$data['nama_tipe'],1,0,'L');
  $pdf->Cell(170,10,$data['deskripsi'],1,0,'L');
  $pdf->Cell(30,10,$data['tarif'],1,0,'L');
  $pdf->Cell(30,10,$data['kamar_tersedia'],1,1,'L');
  $no++;
  }

  $pdf->Output();
?>
