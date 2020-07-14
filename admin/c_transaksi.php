<?php
  require_once('../config/koneksi.php');
  $call = mysqli_query($con, "SELECT nama,nama_tipe,jumlah_kamar,tgl_psn,tgl_in,tgl_out,total
    FROM tbl_transaksi inner join tbl_user on tbl_transaksi.id_user = tbl_user.id_user
    inner join tbl_tipe on tbl_transaksi.id_tipe = tbl_tipe.id_tipe");

  require_once('assets/fpdf/fpdf.php');
  $pdf = new FPDF('l','mm','A4');
  $pdf->addPage();
  $pdf->SetTitle('Cetak List Pesanan');
  $pdf->SetFont('Arial','B','16');
  $pdf->Cell(0,0,'List Pesanan Hotel', 0, 1, 'L');

  $pdf->SetFont('Arial','B','12');
  $pdf->Cell(10,20,'',0,1,'L');
  $pdf->Cell(15,10,'No',1,0,'L');
  $pdf->Cell(50,10,'Nama Pemesan',1,0,'L');
  $pdf->Cell(40,10,'Tipe Kamar',1,0,'L');
  $pdf->Cell(50,10,'Jumlah Kamar',1,0,'L');
  $pdf->Cell(40,10,'Tanggal Masuk',1,0,'L');
  $pdf->Cell(40,10,'Tanggal Keluar',1,0,'L');
  $pdf->Cell(40,10,'Total Bayar',1,1,'L');

  $no=1;
  while($data = mysqli_fetch_array($call)){
  $pdf->SetFont('Arial','B','12');
  $pdf->Cell(15,10,$no,1,0,'L');
  $pdf->Cell(50,10,$data['nama'],1,0,'L');
  $pdf->Cell(40,10,$data['nama_tipe'],1,0,'L');
  $pdf->Cell(50,10,$data['jumlah_kamar'],1,0,'L');
  $pdf->Cell(40,10,$data['tgl_in'],1,0,'L');
  $pdf->Cell(40,10,$data['tgl_out'],1,0,'L');
  $pdf->Cell(40,10,$data['total'],1,1,'L');
  $no++;
  }

  $pdf->Output();
?>
