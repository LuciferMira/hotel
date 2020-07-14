<?php
  require_once('../config/koneksi.php');
  $time = date_default_timezone_set("Asia/Jakarta");
  $skrg = date('yy-m-d');
  $idt = $_GET['id'];
  $call = mysqli_query($con, "SELECT nama,nama_tipe,jumlah_kamar,tgl_psn,tgl_in,tgl_out,total
    FROM tbl_transaksi inner join tbl_user on tbl_transaksi.id_user = tbl_user.id_user
    inner join tbl_tipe on tbl_transaksi.id_tipe = tbl_tipe.id_tipe where tbl_transaksi.id_transaksi='$idt'");

  require_once('assets/fpdf/fpdf.php');
  $pdf = new FPDF('l','mm','A4');
  $pdf->addPage();
  $pdf->SetTitle('Cetak Bukti Pembayaran');
  $pdf->SetFont('Arial','B','16');
  $pdf->Cell(0,0,'Bukti Pembayaran Hotel', 0, 1, 'L');

  $data = mysqli_fetch_array($call);
  $pdf->SetFont('Arial','B','12');
  $pdf->Cell(10,20,'',0,1,'L');
  $pdf->Cell(30,20,'Atas Nama : ',0,0,'L');
  $pdf->Cell(20,20,$data['nama'],0,1,'L');
  $pdf->Cell(30,10,'Tipe Kamar : ',0,0,'L');
  $pdf->Cell(20,10,$data['nama_tipe'],0,1,'L');
  $pdf->Cell(40,20,'Jumlah Kamar : ',0,0,'L');
  $pdf->Cell(20,20,$data['jumlah_kamar'],0,1,'L');
  $pdf->Cell(50,20,'Tanggal Pemesanan : ',0,0,'L');
  $pdf->Cell(20,20,$data['tgl_psn'],0,1,'L');
  $pdf->Cell(40,20,'Tanggal Checkin : ',0,0,'L');
  $pdf->Cell(20,20,$data['tgl_in'],0,1,'L');
  $pdf->Cell(40,20,'Tanggal Checkout : ',0,0,'L');
  $pdf->Cell(20,20,$data['tgl_out'],0,1,'L');
  $pdf->Cell(30,20,'Total Bayar : ',0,0,'L');
  $pdf->Cell(20,20,'Rp. '.$data['total'],0,1,'L');

  // $pdf->SetFont('Arial','B','12');
  // $pdf->Cell(10,20,'',0,1,'L');
  // $pdf->Cell(15,10,'No',1,0,'L');
  // $pdf->Cell(50,10,'Nama',1,0,'L');
  // $pdf->Cell(40,10,'Jenis Kelamin',1,0,'L');
  // $pdf->Cell(50,10,'Email',1,0,'L');
  // $pdf->Cell(40,10,'No Telp',1,0,'L');
  // $pdf->Cell(80,10,'Alamat',1,1,'L');
  //
  // $no=1;
  // while($data = mysqli_fetch_array($call)){
  // $pdf->SetFont('Arial','B','12');
  // $pdf->Cell(15,10,$no,1,0,'L');
  // $pdf->Cell(50,10,$data['nama'],1,0,'L');
  // $pdf->Cell(40,10,$data['jns_kelamin'],1,0,'L');
  // $pdf->Cell(50,10,$data['email'],1,0,'L');
  // $pdf->Cell(40,10,$data['no_telp'],1,0,'L');
  // $pdf->Cell(80,10,$data['alamat'],1,1,'L');
  // $no++;
  // }

  $pdf->Output();
?>
