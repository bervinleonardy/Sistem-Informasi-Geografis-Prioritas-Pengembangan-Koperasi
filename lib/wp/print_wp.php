<?php
include "../../include/lib_inc.php";
include "../../include/Classes/PHPExcel.php";

date_default_timezone_set("Asia/Jakarta");

$excelku = new PHPExcel();

// Set properties
$excelku->getProperties()->setCreator("Admin Dinas Koperasi Usaha Mikro, Kecil dan Menengah Kota Bandung")
                         ->setLastModifiedBy("admin");

// Set lebar kolom
$excelku->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$excelku->getActiveSheet()->getColumnDimension('B')->setWidth(80);
$excelku->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$excelku->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$excelku->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$excelku->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$excelku->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$excelku->getActiveSheet()->getColumnDimension('H')->setWidth(20);
$excelku->getActiveSheet()->getColumnDimension('I')->setWidth(20);
$excelku->getActiveSheet()->getColumnDimension('J')->setWidth(20);

// Mergecell, menyatukan beberapa kolom
$excelku->getActiveSheet()->mergeCells('C1:J1');
$excelku->getActiveSheet()->mergeCells('C2:J2');
$excelku->getActiveSheet()->mergeCells('C3:J3');
$excelku->getActiveSheet()->mergeCells('C4:J4');

// Buat Kolom judul tabel
$SI = $excelku->setActiveSheetIndex(0);
$SI->setCellValue('C1', 'DINAS KOPERASI USAHA MIKRO,KECIL DAN MENENGAH');
$SI->setCellValue('C2', 'KOTA BANDUNG');
$SI->setCellValue('C3', 'Jalan Kawaluyaan No.2, Jati Sari, Buahbatu, Jatisari, Buahbatu, Kota Bandung, Jawa Barat 40286');
$SI->setCellValue('C4', 'Data Penentuan Prioritas Pengembangan Koperasi');
$excelku->getActiveSheet()->getStyle('C1:E4')->getFont()->setName('Arial');
$excelku->getActiveSheet()->getStyle('C1:E4')->getFont()->setSize(14);
$excelku->getActiveSheet()->getStyle('C4')->getFont()->setSize(10);
$excelku->getActiveSheet()->getStyle('C4')->getFont()->setSize(18);
$excelku->getActiveSheet()->getStyle('C1:E4')->getFont()->setBold(true);
$excelku->getActiveSheet()->getStyle('B1:E4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// Set title row bold;
$excelku->getActiveSheet()->getStyle('A6:E6')->getFont()->setBold(true);
// Set fills
$excelku->getActiveSheet()->getStyle('A6:E6')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$excelku->getActiveSheet()->getStyle('A6:E6')->getFill()->getStartColor()->setARGB('FFEEEEEE');
 
 
$SI->setCellValue('A6', 'No');
$SI->setCellValue('B6', 'Koperasi');
$SI->setCellValue('C6', 'Jenis Koperasi');
$SI->setCellValue('D6', 'Keaktifan');
$SI->setCellValue('E6', 'Jumlah Anggota');
$SI->setCellValue('F6', 'Modal Sendiri');
$SI->setCellValue('G6', 'Asset');
$SI->setCellValue('H6', 'Volume Usaha');
$SI->setCellValue('I6', 'Sisa Hasil Usaha');
$SI->setCellValue('J6', 'Produktifitas (%)');

// Menambahkan file gambar pada document excel pada kolom B2
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('Dinas Koperasi Kota Bandung');
$objDrawing->setDescription('Logo Dinas');
$objDrawing->setPath('../../img/logo/logo.png');
$objDrawing->setCoordinates('B2');
$objDrawing->setHeight(100);
$objDrawing->setWidth(100); 
$objDrawing->setWorksheet($excelku->getActiveSheet());

//Mengeset Syle nya
$headerStylenya = new PHPExcel_Style();
$bodyStylenya   = new PHPExcel_Style();

$headerStylenya->applyFromArray(
	
    array('font' => array(
 		  'bold' => true),
		  'fill'     => array(		  
          'type'    => PHPExcel_Style_Fill::FILL_SOLID,
          'color'   => array('argb'  => 'FFEEEEEE')),
          'borders' => array('bottom'=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                        'right'      => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                        'left'       => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                        'top'        => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM)
          )
    ));
   
$bodyStylenya->applyFromArray(
    array('fill'     => array(
          'type'    => PHPExcel_Style_Fill::FILL_SOLID,
          'color'    => array('argb' => 'FFFFFFFF')),
          'borders' => array(
                        'bottom'     => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                        'right'      => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                        'left'       => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
                        'top'        => array('style' => PHPExcel_Style_Border::BORDER_THIN)
          )
    ));

//Menggunakan HeaderStylenya
$excelku->getActiveSheet()->setSharedStyle($headerStylenya, "A6:J6");

// Mengambil data dari tabel
$sql = "SELECT * FROM wp";										
$query = mysqli_query($conn, $sql);	

$baris=7;
$no=1;
//inisialisasi
$p = 'Berpengaruh';
$tp= 'Tidak Berpengaruh';
$sr= 'Sangat Rendah';
$r = 'Rendah';
$s = 'Sedang';
$t = 'Tinggi';
$st= 'Sangat Tinggi';

while ($row = mysqli_fetch_array($query)) {	
	$sqla = "SELECT id_koperasi,nama_koperasi,jenis_koperasi FROM data_koperasi WHERE id_koperasi='$row[id_koperasi]'";
	$querya = mysqli_query($conn, $sqla);
	$rowa = mysqli_fetch_array($querya);
	
	  $SI->setCellValue("A".$baris,$no); //mengisi data untuk nomor urut
	  $SI->setCellValue("B".$baris,$rowa['nama_koperasi']); //mengisi data untuk nama
	  $SI->setCellValue("C".$baris,$rowa['jenis_koperasi']); //mengisi data untuk jenis
		// KEAKTIFAN
		if  ($row['keaktifan'] == 'aktif')  {
			 $SI->setCellValue("D".$baris,'Berpengaruh'); //mengisi data untuk keaktifan
		}
		if ($row['keaktifan'] == 'tidak aktif') {
			 $SI->setCellValue("D".$baris,'Tidak Berpengaruh');
		}	
		// JUMLAH ANGGOTA
		if ($row['jumlah_anggota'] < 1) {
			 $SI->setCellValue("E".$baris,'Sangat Rendah'); //mengisi data untuk jumlah anggota
		}
		if (($row['jumlah_anggota'] >= 1) && ($row['jumlah_anggota'] <= 5)) {
			 $SI->setCellValue("E".$baris,'Rendah'); //mengisi data untuk jumlah anggota
		}									
		if (($row['jumlah_anggota'] >= 5) && ($row['jumlah_anggota'] <= 10)) {
			 $SI->setCellValue("E".$baris,'Sedang'); //mengisi data untuk jumlah anggota
		}									
		if (($row['jumlah_anggota'] >= 10) && ($row['jumlah_anggota'] <= 20)) {
			 $SI->setCellValue("E".$baris,'Tinggi'); //mengisi data untuk jumlah anggota
		}									
		if  ($row['jumlah_anggota'] > 20) {
			 $SI->setCellValue("E".$baris,'Sangat Tinggi'); //mengisi data untuk jumlah anggota
		}	  
		// MODAL SENDIRI
		if ($row['modal_sendiri'] < 12035000) {
			 $SI->setCellValue("F".$baris,'Sangat Rendah'); //mengisi data untuk jumlah modal sendiri
		}
		if (($row['modal_sendiri'] >= 12035000) && ($row['modal_sendiri'] <= 100000000)) {
			 $SI->setCellValue("F".$baris,'Rendah'); //mengisi data untuk modal sendiri
		}									
		if (($row['modal_sendiri'] >= 100000000) && ($row['modal_sendiri'] <= 700000000)) {
			 $SI->setCellValue("F".$baris,'Sedang'); //mengisi data untuk modal sendiri
		}									
		if (($row['modal_sendiri'] >= 700000000) && ($row['modal_sendiri'] <= 1000000000)) {
			 $SI->setCellValue("F".$baris,'Tinggi');
		}									
		if  ($row['modal_sendiri'] > 1000000000) {
			 $SI->setCellValue("F".$baris,'Sangat Tinggi');
		}
		// ASSET
		if ($row['asset'] < 29640600) {
			 $SI->setCellValue("G".$baris,'Sangat Rendah');
		}
		if (($row['asset'] >= 29640600) && ($row['asset'] <= 117000000)) {
			 $SI->setCellValue("G".$baris,'Rendah');
		}									
		if (($row['asset'] >= 117000000) && ($row['asset'] <= 720000000)) {
			 $SI->setCellValue("G".$baris,'Sedang');
		}									
		if (($row['asset'] >= 720000000) && ($row['asset'] <= 1500000000)) {
			 $SI->setCellValue("G".$baris,'Tinggi');
		}									
		if  ($row['asset'] > 1500000000) {
			 $SI->setCellValue("G".$baris,'Sangat Tinggi');
		}	
		//OMSET
		if ($row['omset'] < 15200000) {
			 $SI->setCellValue("H".$baris,'Sangat Rendah');
		}
		if (($row['omset'] >= 15200000) && ($row['omset'] <= 103000000)) {
			 $SI->setCellValue("H".$baris,'Rendah');
		}									
		if (($row['omset'] >= 103000000) && ($row['omset'] <= 710000000)) {
			 $SI->setCellValue("H".$baris,'Sedang');
		}									
		if (($row['omset'] >= 710000000) && ($row['omset'] <= 1100000000)) {
			 $SI->setCellValue("H".$baris,'Tinggi');
		}									
		if  ($row['omset'] > 1100000000) {
			 $SI->setCellValue("H".$baris,'Sangat Tinggi');
		}	
		//Sisa Hasil Usaha
		if ($row['shu'] < 3801000) {
			 $SI->setCellValue("I".$baris,'Sangat Rendah');
		}
		if (($row['shu'] >= 3801000) && ($row['shu'] <= 10000000)) {
			 $SI->setCellValue("I".$baris,'Rendah');
		}									
		if (($row['shu'] >= 10000000) && ($row['shu'] <= 40000000)) {
			 $SI->setCellValue("I".$baris,'Sedang');
		}									
		if (($row['shu'] >= 40000000) && ($row['shu'] <= 100000000)) {
			 $SI->setCellValue("I".$baris,'Tinggi');
		}									
		if  ($row['shu'] > 100000000) {
			 $SI->setCellValue("I".$baris,'Sangat Tinggi');
		}		
		//Produktifitas
		if ($row['produktifitas'] <= 3) {
			 $SI->setCellValue("J".$baris,'Sangat Rendah');
		}
		if (($row['produktifitas'] > 3) && ($row['produktifitas'] <= 8)) {
			 $SI->setCellValue("J".$baris,'Rendah');
		}									
		if (($row['produktifitas'] >= 9) && ($row['produktifitas'] <= 14)) {
			 $SI->setCellValue("J".$baris,'Sedang');
		}									
		if (($row['produktifitas'] >= 15) && ($row['produktifitas'] <= 20)) {
			 $SI->setCellValue("J".$baris,'Tinggi');
		}									
		if  ($row['produktifitas'] > 20) {
			 $SI->setCellValue("J".$baris,'Sangat Tinggi');
		}	
	
	  $no++;
	  $baris++; //looping untuk barisnya
}
//Membuat garis di body tabel (isi data)
$excelku->getActiveSheet()->setSharedStyle($bodyStylenya, "A7:J$baris");



//Memberi nama sheet
$excelku->getActiveSheet()->setTitle('Data Penentuan');

$excelku->setActiveSheetIndex(0);

// untuk excel 2007 atau yang berekstensi .xlsx
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename=data-penentuan.xlsx');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($excelku, 'Excel2007');
$objWriter->save('php://output');
exit;

?>