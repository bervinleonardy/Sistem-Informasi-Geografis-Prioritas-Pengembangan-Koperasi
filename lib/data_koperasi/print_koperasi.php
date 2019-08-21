<?php
include "../../include/lib_inc.php";
include "../../include/Classes/PHPExcel.php";

date_default_timezone_set("Asia/Jakarta");

$excelku = new PHPExcel();

// Set properties
$excelku->getProperties()->setCreator("Admin Dinas Koperasi Usaha Mikro, Kecil dan Menengah Kota Bandung")
                         ->setLastModifiedBy("admin");

// Set lebar kolom
$excelku->getActiveSheet()->getColumnDimension('A')->setWidth(25);
$excelku->getActiveSheet()->getColumnDimension('B')->setWidth(80);
$excelku->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$excelku->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$excelku->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$excelku->getActiveSheet()->getColumnDimension('F')->setWidth(40);
$excelku->getActiveSheet()->getColumnDimension('G')->setWidth(100);
$excelku->getActiveSheet()->getColumnDimension('H')->setWidth(30);
$excelku->getActiveSheet()->getColumnDimension('I')->setWidth(20);
$excelku->getActiveSheet()->getColumnDimension('J')->setWidth(20);

// Mergecell, menyatukan beberapa kolom
$excelku->getActiveSheet()->mergeCells('C1:J1');
$excelku->getActiveSheet()->mergeCells('C2:J2');
$excelku->getActiveSheet()->mergeCells('C3:J3');
$excelku->getActiveSheet()->mergeCells('C4:J4');

// Buat Kolom judul tabel
$SI = $excelku->setActiveSheetIndex(0);
$SI->setCellValue('C1', 'DINAS KOPERASI USAHA MIKRO,KECIL DAN MENENGAH'); //Judul laporan
$SI->setCellValue('C2', 'KOTA BANDUNG'); //Judul laporan
$SI->setCellValue('C3', 'Jalan Kawaluyaan No.2, Jati Sari, Buahbatu, Jatisari, Buahbatu, Kota Bandung, Jawa Barat 40286'); //Judul laporan
$SI->setCellValue('C4', 'Data Koperasi'); //Judul laporan
$excelku->getActiveSheet()->getStyle('C1:E4')->getFont()->setName('Arial');
$excelku->getActiveSheet()->getStyle('C1:E4')->getFont()->setSize(14);
$excelku->getActiveSheet()->getStyle('C4')->getFont()->setSize(10);
$excelku->getActiveSheet()->getStyle('C4')->getFont()->setSize(18);
$excelku->getActiveSheet()->getStyle('C1:E4')->getFont()->setBold(true);
$excelku->getActiveSheet()->getStyle('B1:E4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// Set title row bold;
$excelku->getActiveSheet()->getStyle('A6:J6')->getFont()->setBold(true);
// Set fills
$excelku->getActiveSheet()->getStyle('A6:J6')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$excelku->getActiveSheet()->getStyle('A6:J6')->getFill()->getStartColor()->setARGB('FFEEEEEE');
 
 
$SI->setCellValue('A6', 'ID Koperasi');
$SI->setCellValue('B6', 'Nama Koperasi');
$SI->setCellValue('C6', 'Pengurus');
$SI->setCellValue('D6', 'Jenis Koperasi');
$SI->setCellValue('E6', 'Kelompok Koperasi');
$SI->setCellValue('F6', 'Sektor Usaha');
$SI->setCellValue('G6', 'Alamat Lengkap');
$SI->setCellValue('H6', 'Email');
$SI->setCellValue('I6', 'No. Telp');
$SI->setCellValue('J6', 'Bentuk Koperasi');

// Menambahkan file gambar pada document excel pada kolom B2
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('Dinas Pemerintahan Kota Bandung');
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
$sql = 'SELECT * FROM data_koperasi';										
$query = mysqli_query($conn, $sql);								
$baris=7;
$no=1;
while ($row = mysqli_fetch_array($query)) {	
  $SI->setCellValue("A".$baris,$row['id_koperasi']);  
  $SI->setCellValue("B".$baris,$row['nama_koperasi']);  
  $sqla = "SELECT * FROM pengurus WHERE id_pengurus='$row[id_pengurus]'";
  $querya = mysqli_query($conn, $sqla);								
  $rowa = mysqli_fetch_array($querya);
	
  $SI->setCellValue("C".$baris,$rowa['nama_pengurus']);
  $SI->setCellValue("D".$baris,$row['jenis_koperasi']);
  $SI->setCellValue("E".$baris,$row['kel_koperasi']);
  $sqlb = "SELECT id_sektor, nama_sektor FROM sektor_usaha WHERE id_sektor='$row[id_sektor]'";										
  $queryb = mysqli_query($conn, $sqlb);								
  $rowb = mysqli_fetch_array($queryb);
  $SI->setCellValue("F".$baris,$rowb['nama_sektor']);
  $sqlc = "SELECT * FROM kelurahan WHERE id_kelurahan='$row[id_kelurahan]'";					$queryc = mysqli_query($conn, $sqlc);								
  $rowc = mysqli_fetch_array($queryc);
	
  $sqld = "SELECT * FROM kecamatan WHERE kode_kecamatan='$rowc[kode_kecamatan]'";				$queryd = mysqli_query($conn, $sqld);								
  $rowd = mysqli_fetch_array($queryd);	
	
  $alamat = "".$row['alamat_koperasi']." Kel. ".$rowc['nama_kelurahan']." Kec. ".$rowd['nama_kecamatan']." Kota. Bandung ".$rowc['kode_pos'].""; 
  $SI->setCellValue("G".$baris,$alamat);
  $SI->setCellValue("H".$baris,$rowa['email_pengurus']);
  $SI->setCellValue("I".$baris,$rowa['no_telp']);
  $SI->setCellValue("J".$baris,$row['bentuk_koperasi']);
//  $no++;
  $baris++; //looping untuk barisnya
}
//Membuat garis di body tabel (isi data)
$excelku->getActiveSheet()->setSharedStyle($bodyStylenya, "A7:J$baris");

//Memberi nama sheet
$excelku->getActiveSheet()->setTitle('Data Koperasi');

$excelku->setActiveSheetIndex(0);

// untuk excel 2007 atau yang berekstensi .xlsx
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename=data-koperasi.xlsx');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($excelku, 'Excel2007');
$objWriter->save('php://output');
exit;

?>