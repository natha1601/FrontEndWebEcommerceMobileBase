<?php
session_start();
include 'koneksi.php';

require("pdf/fpdf.php");

$pdf = new FPDF('p', 'mm', 'A4');
$pdf -> addPage();

$sql = " SELECT i.id_invoice, i.tanggal_print, u.nama, u.no_hp, u.email, b.nama_bpjs, r.periode, r.tanggal_input, iuran
FROM invoice i
INNER JOIN user u ON i.id_user = u.id_user
INNER JOIN riwayat_transaksi r ON i.id_rtransaksi = r.id_rtransaksi
INNER JOIN bpjs b ON r.id_bpjs = b.id_bpjs
INNER JOIN kelas_bpjs k ON b.id_kelas = k.id_kelas
ORDER BY id_invoice DESC";

if($result = mysqli_query($database, $sql)){
    if(mysqli_num_rows($result) > 0){
    while ( $row = mysqli_fetch_assoc($result)) {
        $date = date('F Y', strtotime($row['periode']));

//spasi
$pdf -> Cell('190', '7', '', 0,1);

//judul
$pdf -> SetFont('Arial', 'B', '18');
$pdf -> Cell('190', '5', 'BUKTI PEMBAYARAN', 0,1, 'C');

//spasi
$pdf -> Cell('190', '7', '', 0,1);
$pdf -> Cell('190', '7', '', 0,1);

//header
$pdf -> SetFont('Arial', '', '14');
$pdf -> Cell('100', '7', 'PT Sepulsa Teknologi Indonesia', 0, 0);
$pdf -> SetFont('Arial', 'B', '14');
$pdf -> setFillColor(242, 242, 242);
$pdf -> Cell('45', '7', 'Nomor', 1, 0, 'C', 1);
$pdf -> Cell('45', '7', 'Tanggal', 1, 1, 'C', 1);

$pdf -> SetFont('Arial', '', '14');
$pdf -> Cell('100', '7', 'Jl. Setia Budi No.37', 0, 0);
$pdf -> Cell('45', '7', $row['id_invoice'] , 1, 0, 'C');
$pdf -> Cell('45', '7', date('d/m/Y',strtotime($row['tanggal_print'])) , 1, 1, 'C');

$pdf -> Cell('190', '7', 'Daerah Khusus Ibukota Jakarta, 12910', 0, 1);
$pdf -> Cell('190', '7', '+622131997319', 0, 1);

//spasi
$pdf -> Cell('190', '7', '', 0,1);
$pdf -> Cell('190', '7', '', 0,1);

//data pembayar
$pdf -> SetFont('Arial', 'B', '14');
$pdf -> Cell('190', '7', 'PEMBAYARAN OLEH', 0, 1);
$pdf -> SetFont('Arial', '', '14');
$pdf -> Cell('30', '7', 'Nama', 0, 0);
$pdf -> Cell('160', '7', ': ' . $row['nama'], 0, 1);
$pdf -> Cell('30', '7', 'No. Telp', 0, 0);
$pdf -> Cell('160', '7', ': ' . $row['no_hp'], 0, 1);
$pdf -> Cell('30', '7', 'E-mail', 0, 0);
$pdf -> Cell('160', '7', ': ' . $row['email'], 0, 1);

//spasi
$pdf -> Cell('190', '7', '', 0,1);
$pdf -> Cell('190', '7', '', 0,1);

//desc pembayaran
$pdf -> SetFont('Arial', 'B', '14');
$pdf -> Cell('190', '7', 'DESKRIPSI PEMBAYARAN', 1, 1, 'C', 1);
$pdf -> SetFont('Arial', '', '14');
$pdf -> Cell('60', '7', 'Nama', 1, 0);
$pdf -> Cell('130', '7', $row['nama_bpjs'], 1, 1);
$pdf -> Cell('60', '7', 'Jenis Pembayaran', 1, 0);
$pdf -> Cell('130', '7', 'BPJS Kesehatan', 1, 1);
$pdf -> Cell('60', '7', 'Periode', 1, 0);
$pdf -> Cell('130', '7', $date, 1, 1);
$pdf -> Cell('60', '7', 'Tanggal Pembayaran', 1, 0);
$pdf -> Cell('130', '7', date('d/m/Y',strtotime($row['tanggal_input'])), 1, 1);
$pdf -> Cell('60', '7', 'Waktu Pembayaran', 1, 0);
$pdf -> Cell('130', '7', date('h:m:s',strtotime($row['tanggal_input'])), 1, 1);
$pdf -> SetFont('Arial', 'B', '14');
$pdf -> Cell('60', '7', 'TOTAL', 1, 0, 'C', 1);
$pdf -> Cell('130', '7', 'Rp ' . number_format($row['iuran'], 0, ",", "."), 1, 1, 'R', 1);

//spasi
$pdf -> Cell('190', '7', '', 0,1);
$pdf -> Cell('190', '7', '', 0,1);

//penutup
$pdf -> Cell('190', '7', 'Jika ada pertanyaan mengenai bukti pembayaran,', 0, 1, 'C');
$pdf -> Cell('190', '7', 'silahkan hubungi kontak di bawah ini', 0, 1, 'C');
$pdf -> Cell('190', '7', 'Dina, +6281517773331, fadina@sepulsa.com', 0, 1, 'C');

$pdf -> Output();

    }}}
?>