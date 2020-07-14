<?php
  require_once('../config/koneksi.php');
  $call = mysqli_query($con, "SELECT * FROM tbl_user WHERE akses='adm'");

  require_once('assets/fpdf/fpdf.php');
  $pdf = new FPDF('l','mm','A4');
  $pdf->addPage();
  $pdf->SetTitle('Cetak List Administrator');
  $pdf->SetFont('Arial','B','16');
  $pdf->Cell(0,0,'List Administrator Hotel', 0, 1, 'L');

  $pdf->SetFont('Arial','B','12');
  $pdf->Cell(10,20,'',0,1,'L');
  $pdf->Cell(15,10,'No',1,0,'L');
  $pdf->Cell(50,10,'Nama',1,0,'L');
  $pdf->Cell(40,10,'Jenis Kelamin',1,0,'L');
  $pdf->Cell(50,10,'Email',1,0,'L');
  $pdf->Cell(40,10,'No Telp',1,0,'L');
  $pdf->Cell(80,10,'Alamat',1,1,'L');

  $no=1;
  while($data = mysqli_fetch_array($call)){
  $pdf->SetFont('Arial','B','12');
  $pdf->Cell(15,10,$no,1,0,'L');
  $pdf->Cell(50,10,$data['nama'],1,0,'L');
  $pdf->Cell(40,10,$data['jns_kelamin'],1,0,'L');
  $pdf->Cell(50,10,$data['email'],1,0,'L');
  $pdf->Cell(40,10,$data['no_telp'],1,0,'L');
  $pdf->Cell(80,10,$data['alamat'],1,1,'L');
  $no++;
  }

  $pdf->Output();
?>
